# Description du projet — Concours de photographie (SAE203)

> Document de référence pour comprendre la structure et le fonctionnement du site,
> et pour anticiper les questions sur le code. Il se lit de haut en bas :
> vue d'ensemble → architecture → base de données → parcours détaillés → points d'attention.

---

## 1. Vue d'ensemble

Le site est une **application de concours photo**. Les visiteurs voient les photos, les
utilisateurs inscrits peuvent **poster une photo** et **noter (1 à 5 étoiles)** les photos
des autres. Un **podium** affiche le top 3 des photos les mieux notées, et un **graphique**
montre le nombre de photos publiées par auteur.

C'est une application **PHP « maison »** : pas de framework, pas de routeur, pas
d'autoloader. L'organisation suit le patron **MVC** (Modèle / Vue / Contrôleur) appliqué
manuellement avec des `require`.

### Stack technique

| Élément          | Choix                                                            |
| ---------------- | ---------------------------------------------------------------- |
| Serveur          | XAMPP (Apache + MySQL)                                           |
| Langage backend  | PHP procédural (fonctions, pas de classes)                       |
| Accès BDD        | PDO + requêtes préparées                                         |
| Base de données  | MySQL, base `sae203`                                             |
| Front            | HTML/CSS, un peu de JS « vanilla » (sans framework)              |
| Graphique        | Chart.js chargé via CDN                                          |
| Mise en forme    | Prettier + `@prettier/plugin-php`                                |

### Comment le lancer

1. Démarrer Apache et MySQL dans XAMPP.
2. Importer `database.sql` dans phpMyAdmin (crée la base `sae203` et ses tables).
3. Créer **manuellement** le fichier `application/modeles/connect.php` (il est *gitignoré*) :
   ```php
   <?php
   function connect() {
       $db = new PDO("mysql:host=localhost;dbname=sae203", "root", "");
       return $db;
   }
   ```
4. Visiter `http://localhost/siteweb-sae203`.

---

## 2. Le patron MVC dans ce projet

Trois rôles, trois dossiers sous `application/` :

- **Contrôleurs** (`application/controleurs/`) : reçoivent la requête HTTP, décident quoi
  faire (lire la méthode `GET`/`POST`, appeler le bon modèle), puis affichent une vue
  ou redirigent.
- **Modèles** (`application/modeles/`) : fichiers de **fonctions** qui parlent à la base de
  données. Chaque fonction appelle `connect()` pour obtenir une connexion PDO.
- **Vues** (`application/vues/`) : gabarits PHP/HTML qui affichent les données préparées par
  le contrôleur (`$listePhotos`, `$podium`, etc.). Elles incluent `header.php` et
  `footer.php` pour l'enveloppe commune.

L'**URL d'entrée** est le contrôleur lui-même. Exemple : on appelle directement
`application/controleurs/accueil.php` dans le navigateur. `index.php` ne sert qu'à
**rediriger** vers l'accueil.

### Schéma du flux d'une requête (page d'accueil)

```
index.php
   └── redirige vers application/controleurs/accueil.php   (CONTRÔLEUR)
           ├── require modeles/photos.php   → obtenirPhotos() + getPhotosParAuteur()
           ├── require modeles/rating.php   → selectUserRating()
           └── require vues/vueAccueil.php  (VUE)
                   ├── require header.php           (barre de navigation)
                   ├── pour chaque photo : selectAllRatings() + widget d'étoiles
                   ├── require vues/vuePhotosParAuteur.php  (graphique)
                   └── require footer.php
```

> Note : le graphique a été refactorisé. Les données (`$labels`, `$values`) sont
> désormais préparées par le **contrôleur** `accueil.php` (via `getPhotosParAuteur()`,
> côté modèle), et la vue `vueAccueil.php` n'inclut plus qu'une **vue**
> (`vuePhotosParAuteur.php`) qui se contente d'afficher le graphique. Le respect des
> rôles MVC est donc rétabli (voir §8.8).

---

## 3. Structure des fichiers

```
siteweb-sae203/
├── index.php                       → redirige vers l'accueil
├── database.sql                    → schéma + données + triggers (export complet)
├── application/
│   ├── controleurs/
│   │   ├── accueil.php             → page d'accueil (liste des photos + notes)
│   │   ├── connexion.php           → traite la connexion (POST) / affiche le formulaire
│   │   ├── deconnexion.php         → vide la session et redirige
│   │   ├── inscription.php         → crée un compte (POST) / affiche le formulaire
│   │   ├── note.php                → valide puis enregistre un vote (via GET)
│   │   ├── podium.php              → calcule et affiche le top 3
│   │   ├── postPhoto.php           → traite l'upload (POST) / affiche le formulaire
│   │   └── tests.php               → test de connexion BDD (protégé)
│   ├── modeles/
│   │   ├── connect.php             → fonction connect() (GITIGNORÉ, à créer)
│   │   ├── photos.php              → obtenirPhotos(), getPhotoById(), getPhotosParAuteur()
│   │   ├── post.php                → importPhoto()
│   │   ├── rating.php              → votes : import/delete/select/top3/moyenne
│   │   └── utilisateurs.php        → connexionOk(), addUser(), getCom()
│   └── vues/
│       ├── header.php / footer.php → enveloppe commune
│       ├── vueAccueil.php          → grille de photos + notation
│       ├── vueConnexion.php        → formulaire de connexion
│       ├── vueInscription.php      → formulaire d'inscription
│       ├── vuePostPhoto.php        → formulaire d'upload
│       ├── vuePodium.php           → podium top 3
│       └── vuePhotosParAuteur.php  → graphique Chart.js
└── public/
    ├── css/   → global / header / accueil / form / rating
    ├── js/    → header.js (menu burger) / bigPic.js (agrandir une image)
    └── media/ → images uploadées + assets
```

---

## 4. La base de données (`sae203`)

Quatre tables. Moteur InnoDB, avec clés étrangères.

### `users` — les comptes

| Colonne    | Type         | Rôle                                  |
| ---------- | ------------ | ------------------------------------- |
| `id`       | int, PK auto | identifiant unique                    |
| `alias`    | varchar(30)  | pseudo (sert d'identifiant de login)  |
| `email`    | varchar(128) | email                                 |
| `password` | varchar(128) | mot de passe (**en clair**, voir §8)  |
| `commune`  | varchar(20)  | code INSEE de la commune choisie      |

### `photos` — les photos publiées

| Colonne       | Type           | Rôle                                          |
| ------------- | -------------- | --------------------------------------------- |
| `id`          | int, PK auto   | identifiant                                   |
| `author_id`   | int, FK→users  | auteur de la photo                            |
| `description` | tinytext       | description                                   |
| `file_path`   | varchar(128)   | chemin relatif (`public/media/images/...`)    |
| `upload_date` | datetime       | date d'envoi                                  |
| `title`       | varchar(128)   | titre                                         |
| `moyenne`     | decimal(3,2)   | **note moyenne précalculée** (par triggers)   |

### `votes` — les notes

| Colonne    | Type | Rôle                                        |
| ---------- | ---- | ------------------------------------------- |
| `photo_id` | int  | photo notée (FK→photos)                     |
| `user_id`  | int  | votant (FK→users)                           |
| `grade`    | int  | note de 1 à 5                               |

**Clé primaire composée `(photo_id, user_id)`** : c'est elle qui garantit qu'un
utilisateur ne peut avoir **qu'une seule note par photo**. C'est ce qui rend possible le
`ON DUPLICATE KEY UPDATE` côté PHP (revoter remplace la note au lieu d'en créer une
deuxième).

### `communes` — référentiel pour l'inscription

`code_insee`, `nom_standard`, `code_postal`, `dep_code`. Sert à remplir le menu déroulant
du formulaire d'inscription. (Le jeu de données ne contient que le département 01.)

### Les triggers (calcul automatique de la moyenne)

Trois déclencheurs MySQL maintiennent `photos.moyenne` à jour automatiquement :

- `table_insert` : **après INSERT** sur `votes` → recalcule la moyenne de la photo.
- `table_update` : **après UPDATE** sur `votes` → idem.
- `table_delete` : **après DELETE** sur `votes` → idem (utilise `OLD.photo_id`).

Chacun fait : `UPDATE photos SET moyenne = (SELECT AVG(grade) FROM votes WHERE photo_id = ...)`.

> 👉 **Point clé pour l'oral** : la moyenne n'est **pas** recalculée en PHP. Le PHP se
> contente d'insérer/mettre à jour un vote ; la base s'occupe seule de recalculer
> `photos.moyenne`. C'est un choix de déporter la logique dans la BDD.

---

## 5. Les parcours fonctionnels en détail

### 5.1 Page d'accueil (`accueil.php` → `vueAccueil.php`)

1. Le contrôleur démarre la session, appelle `obtenirPhotos()` (toutes les photos triées
   par date) et, **si l'utilisateur est connecté**, `selectUserRating()` (ses propres
   notes, sous forme de tableau `photo_id => grade`).
2. La vue boucle sur les photos. Pour chacune :
   - elle affiche l'image (`../../` + `file_path`) ;
   - elle récupère la moyenne via `selectAllRatings($id)` ;
   - elle décide quoi montrer selon trois cas :
     - **connecté ET pas l'auteur** → le widget de notation (étoiles) + la moyenne ;
     - **connecté ET auteur de la photo** → seulement la moyenne (on ne note pas ses
       propres photos) ;
     - **non connecté** → un lien « Connectez-vous pour accéder aux notes ».
3. En bas : le bloc `#parent` (image agrandie au clic, géré par `bigPic.js`), puis le
   graphique (via le contrôleur `photosParAuteur.php`).

> La règle « on ne note pas ses propres photos » est appliquée **dans la vue**
> (condition `$_SESSION["userId"] !== $src["author_id"]`), pas dans le contrôleur.

### 5.2 Le widget de notation (étoiles)

Les étoiles sont des `radio` HTML stylés en CSS. Le formulaire est en **méthode GET** et
pointe vers `note.php`. Astuce CSS classique : les étoiles sont affichées en **ordre
inversé** (5 → 1) pour pouvoir colorer « cette étoile et toutes celles à sa gauche » au
survol/sélection. La note précédente de l'utilisateur est pré-cochée (`checked`).

### 5.3 Enregistrer un vote (`note.php`)

`note.php` commence par **valider** : il faut être connecté (sinon redirection vers la
connexion), les paramètres `photo_id`/`rating` doivent être présents, la note doit être
entre 1 et 5, et la photo doit exister sans appartenir au votant (vérifié via
`getPhotoById()`, **côté contrôleur**). Ensuite seulement, il appelle `importRating()`
puis redirige vers l'accueil. `importRating()` fait un `INSERT ... ON DUPLICATE KEY UPDATE` :
grâce à la clé primaire `(photo_id, user_id)`, revoter **remplace** l'ancienne note. Le
trigger met ensuite la moyenne à jour.

### 5.4 Connexion (`connexion.php`)

- En **POST** : lit `login` + `pwd`, appelle `connexionOk()`. Si OK, stocke
  `$_SESSION["pseudo"]` et `$_SESSION["userId"]`, puis redirige vers l'accueil. Sinon,
  met un message dans `$_SESSION["error"]` et réaffiche le formulaire.
- En **GET** : affiche `vueConnexion.php`. Le message d'erreur éventuel est affiché puis
  effacé (`unset`).
- `connexionOk()` compare le mot de passe saisi **directement** à celui en base
  (`$pw === $result["password"]`) — pas de hachage (voir §8).

### 5.5 Inscription (`inscription.php`)

- En **POST** : appelle `addUser()` avec login/email/mot de passe/commune, puis redirige.
- En **GET** : affiche `vueInscription.php`, dont le menu déroulant de communes est
  rempli par `getCom()`.

### 5.6 Poster une photo (`postPhoto.php` → `importPhoto()`)

1. Le contrôleur retrouve l'`id` de l'auteur à partir de `$_SESSION["pseudo"]`.
2. **Le contrôleur** construit le nom de fichier (`pseudo-titre_avec_underscores.jpg`) et
   déplace le fichier uploadé dans `public/media/images/`.
3. Il appelle `importPhoto()` en passant le chemin **déjà calculé** ; le modèle se contente
   d'insérer la ligne en base (le chemin stocké est relatif à la racine du projet). Le
   modèle ne touche donc plus ni au système de fichiers ni à la session (voir §8.9).

> Le formulaire utilise `enctype="multipart/form-data"` (obligatoire pour l'upload).
> Le JS de la vue affiche le nom du fichier choisi à la place de « Choose file... ».

### 5.7 Podium (`podium.php` → `vuePodium.php`)

`top3photos()` joint `photos` et `votes`, groupe par photo, calcule la moyenne et le
nombre de votes, trie par moyenne décroissante et limite à 3. La vue affiche les trois
places (or / argent / bronze) avec un `switch` sur l'index de la boucle.

### 5.8 Graphique photos par auteur (`accueil.php` → `vuePhotosParAuteur.php`)

`getPhotosParAuteur()` (modèle `photos.php`) fait un `LEFT JOIN` users↔photos et compte les
photos par auteur (le LEFT JOIN garde les auteurs à 0 photo). Le contrôleur `accueil.php`
en tire `$labels` et `$values`, qui sont passés au JS via `json_encode` dans la vue
`vuePhotosParAuteur.php`, où Chart.js dessine un diagramme en barres.

---

## 6. La session et l'authentification

- Il n'y a **pas de bootstrap commun** : chaque contrôleur qui en a besoin appelle
  lui-même `session_start()`.
- Deux clés stockées à la connexion : `$_SESSION["pseudo"]` (le pseudo, une chaîne) et
  `$_SESSION["userId"]` (l'identifiant, un entier).
- Le header (`header.php`) lit `$_SESSION["pseudo"]` pour afficher soit le menu connecté
  (Accueil / Podium / Poster / Déconnexion), soit le menu visiteur (Accueil / Connexion /
  Inscription).
- La déconnexion fait `session_unset()` puis redirige.

---

## 7. Les assets front (CSS / JS)

- **CSS** : `global.css` (base commune), `header.css` (barre de nav + menu burger),
  `accueil.css` (grille de cartes), `form.css` (formulaires), `rating.css` (étoiles).
  Les vues les chargent en chemin relatif depuis `../../public/css/...`.
- **`header.js`** : gère le **menu burger** en mobile (clic = afficher/masquer la nav).
- **`bigPic.js`** : au clic sur n'importe quelle `<img>`, affiche l'image en grand dans le
  bloc `#parent` ; le bouton de fermeture le masque.

---

## 8. Erreurs d'architecture et de construction (constat + correctif)

Cette section liste les points qui **gênent la lecture, la cohérence ou la sécurité** du
code. Pour chacun : le constat, pourquoi c'est gênant, et le correctif proposé.

> **Statut** : les points marqués **✅ Corrigé** ont été traités dans le code (voir le
> récap en fin de section). Les autres restent à faire.

### 🔴 Sécurité

#### 8.1 Mots de passe stockés en clair
- **Constat** : `addUser()` insère le mot de passe tel quel ; `connexionOk()` compare avec
  `===`. La base contient des mots de passe lisibles (`'a'`, `'h'`...).
- **Pourquoi c'est gênant** : faille de sécurité majeure ; en cas de fuite de la base, tous
  les comptes sont compromis.
- **Correctif** : hacher à l'inscription avec `password_hash($pwd, PASSWORD_DEFAULT)` et
  vérifier à la connexion avec `password_verify($pwd, $hash)`. La colonne `password` est
  déjà assez longue (128).

#### 8.2 Entrées GET/SESSION utilisées sans validation ni contrôle d'accès — ✅ Corrigé
- **Constat** : `note.php` lit `$_GET["photo_id"]`, `$_GET["rating"]` et
  `$_SESSION["userId"]` sans vérifier qu'ils existent ni que l'utilisateur est connecté ;
  rien n'empêche une note hors de 1–5, ni de noter sa propre photo (la règle n'est que dans
  la vue).
- **Pourquoi c'est gênant** : un visiteur non connecté ou une URL forgée provoque une
  erreur PHP (clé de session absente) ou injecte des données invalides.
- **Correctif** : en début de `note.php`, vérifier `isset($_SESSION["userId"])` (sinon
  rediriger vers la connexion), borner `rating` entre 1 et 5, et refuser le vote si
  l'utilisateur est l'auteur de la photo — **dans le contrôleur**, pas seulement la vue.

#### 8.3 Affichage de données sans échappement
- **Constat** : dans `vueAccueil.php`, `description` et `file_path` sont affichés sans
  `htmlspecialchars()` ; `vueConnexion.php` affiche `$_SESSION["error"]` brut. (À l'inverse,
  `header.php` et `vuePodium.php` échappent bien.)
- **Pourquoi c'est gênant** : risque de **XSS** (une description contenant du HTML/JS
  s'exécute) et incohérence de pratique dans le projet.
- **Correctif** : échapper systématiquement toute donnée affichée avec
  `htmlspecialchars(..., ENT_QUOTES, "UTF-8")`, comme c'est déjà fait dans le header.

### 🟠 Bugs et incohérences fonctionnelles

#### 8.4 `deleteRating()` est un copier-coller cassé d'`importRating()` — ✅ Corrigé
- **Constat** : dans `rating.php`, `deleteRating()` ne supprime rien : elle contient le même
  `INSERT ... ON DUPLICATE KEY UPDATE` qu'`importRating()`, et utilise une variable `$grade`
  qui n'est même pas un paramètre de la fonction.
- **Pourquoi c'est gênant** : la fonction est trompeuse (son nom ment) et planterait si elle
  était appelée. Le bouton « Clear » de la vue est d'ailleurs commenté.
- **Correctif** : soit la supprimer (elle n'est utilisée nulle part), soit la réécrire en
  `DELETE FROM votes WHERE photo_id = :photo_id AND user_id = :user_id`.

#### 8.5 `selectAllRatings()` est rappelée pour chaque photo (N+1)
- **Constat** : `vueAccueil.php` appelle `selectAllRatings($id)` dans la boucle, soit une
  requête SQL par photo, alors que la moyenne est déjà dans `photos.moyenne`.
- **Pourquoi c'est gênant** : multiplie les requêtes inutilement et complique la lecture.
- **Correctif** : `obtenirPhotos()` fait déjà `SELECT *`, donc `moyenne` est déjà disponible
  dans `$src["moyenne"]`. Utiliser directement cette colonne et supprimer l'appel par photo.

#### 8.6 Tri du podium incohérent avec son but
- **Constat** : `top3photos()` trie par `moyenne` mais ne tient pas compte du nombre de
  votes ; une photo notée 5 par une seule personne passe devant une photo notée 4,8 par 50
  personnes. Par ailleurs, le tri ne départage pas les égalités.
- **Pourquoi c'est gênant** : le « classement » peut sembler injuste/aléatoire.
- **Correctif** : décider d'une règle explicite (ex. exiger un minimum de votes, ou trier par
  `moyenne` puis `nb_votes`) et l'écrire dans le `ORDER BY`.

### 🟡 Architecture et lisibilité

#### 8.7 Le contrôleur `connect()` est inclus de façon incohérente — ✅ Corrigé
- **Constat** : `connect.php` est `require` à des endroits variés — parfois dans le
  contrôleur, parfois en haut d'un modèle (`photos.php`), parfois **dans une fonction**
  (`connexionOk()` fait `require "connect.php"`). Certains modèles supposent que `connect()`
  existe déjà sans l'inclure (`post.php`, `rating.php`).
- **Pourquoi c'est gênant** : l'ordre des `require` devient un piège (un modèle marche ou non
  selon qui l'a inclus avant), et c'est difficile à suivre.
- **Correctif** : inclure `connect.php` **une seule fois** avec `require_once` au début de
  chaque modèle qui en a besoin (ou créer un petit fichier de bootstrap commun).

#### 8.8 Une vue qui `require` un contrôleur — ✅ Corrigé
- **Constat** : `vueAccueil.php` inclut le contrôleur `photosParAuteur.php` en bas de page.
- **Pourquoi c'est gênant** : inverse la responsabilité MVC (la vue pilote un contrôleur),
  ce qui brouille le sens de lecture du flux.
- **Correctif** : faire calculer `$labels`/`$values` par le contrôleur `accueil.php` (ou une
  fonction de modèle), et ne laisser dans la vue que l'affichage du graphique.

#### 8.9 Le modèle écrit sur le disque et lit la session — ✅ Corrigé
- **Constat** : `importPhoto()` (modèle) déplace le fichier uploadé **et** lit
  `$_SESSION["pseudo"]` pour fabriquer le nom de fichier.
- **Pourquoi c'est gênant** : le modèle ne devrait gérer que les données ; manipuler le
  système de fichiers et la session mélange les couches et rend la fonction difficile à
  tester/réutiliser.
- **Correctif** : faire l'`move_uploaded_file` et la construction du nom dans le contrôleur,
  et passer le `file_path` déjà calculé en paramètre du modèle.

#### 8.10 Doublons de gabarit HTML et balises mélangées — ✅ Corrigé
- **Constat** : `header.php` ouvre déjà `<!DOCTYPE html><html><head>...<body>`, mais
  `vueInscription.php` et `vuePostPhoto.php` **réouvrent** un `<!DOCTYPE html><html><head>`
  après avoir inclus le header → HTML invalide (deux documents imbriqués). Des `<link>` et
  `<style>` sont aussi répétés ou placés en plein milieu du `<body>`.
- **Pourquoi c'est gênant** : HTML non valide, CSS dupliqué, structure confuse à relire.
- **Correctif** : ne laisser le squelette HTML que dans `header.php`/`footer.php` ; dans les
  vues, n'écrire que le contenu de la page. Centraliser les `<link>` CSS dans le header.

#### 8.11 Styles « en dur » dans les vues
- **Constat** : `vuePodium.php` et `vuePhotosParAuteur.php` embarquent leur CSS dans une
  balise `<style>`, alors qu'il existe un dossier `public/css/`.
- **Pourquoi c'est gênant** : incohérent avec le reste, et le style n'est pas réutilisable.
- **Correctif** : déplacer ces règles dans des fichiers `.css` dédiés (ex. `podium.css`).

#### 8.12 Code mort, commentaires « A faire » et debug laissés en place — ✅ Corrigé
- **Constat** : `var_dump` commentés (`podium.php`, `vueAccueil.php`), `console.log(images)`
  dans `bigPic.js`, blocs commentés (`<!-- A faire -->`, bouton « Clear »),
  `error_reporting(E_ALL)` activé dans plusieurs contrôleurs, et `tests.php` qui fait un
  `var_dump` de la connexion.
- **Pourquoi c'est gênant** : bruit qui nuit à la lecture et, pour `display_errors`, fuite
  d'informations en cas d'erreur.
- **Correctif** : retirer le code mort et les `var_dump`/`console.log` ; désactiver
  l'affichage des erreurs hors développement ; retirer ou protéger `tests.php`.

#### 8.13 Incohérences de langue et de nommage
- **Constat** : mélange français/anglais dans les noms (`obtenirPhotos` vs `addUser`,
  `getCom`, `top3photos`), `lang="en"` sur des pages françaises, libellés « Choose file... ».
- **Pourquoi c'est gênant** : nuit à la cohérence et à la lisibilité d'ensemble.
- **Correctif** : choisir **une** langue de nommage (de préférence l'anglais pour le code) et
  corriger les attributs `lang` des pages en `fr`.

#### 8.14 `connect()` ne configure pas la gestion d'erreurs PDO
- **Constat** : la connexion PDO n'active pas `PDO::ERRMODE_EXCEPTION`.
- **Pourquoi c'est gênant** : en cas d'erreur SQL, PDO échoue silencieusement et le bug est
  difficile à diagnostiquer.
- **Correctif** : dans `connect()`, ajouter
  `$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);` (à documenter, puisque
  `connect.php` est gitignoré).

---

## 9. Récapitulatif pour réviser

- **MVC manuel** : URL = contrôleur ; contrôleur appelle des **fonctions** de modèle (PDO) ;
  modèle renvoie des tableaux ; vue affiche. Pas de framework.
- **Sécurité** : requêtes **préparées** partout (✅ contre l'injection SQL) mais mots de passe
  **en clair** et XSS partiels (❌).
- **Notes** : table `votes` avec clé primaire `(photo_id, user_id)` → une note par
  utilisateur et par photo ; `ON DUPLICATE KEY UPDATE` pour revoter ; **moyenne calculée par
  triggers MySQL**, pas en PHP.
- **Session** : `pseudo` + `userId`, démarrée dans chaque contrôleur ; le header adapte le
  menu selon la connexion.
- **Upload** : nom de fichier = `pseudo-titre.jpg`, déplacé dans `public/media/images/`,
  chemin relatif stocké en base.
- **Déjà corrigé** (voir §8) : validation/contrôle d'accès du vote, `deleteRating()`,
  inclusion cohérente de `connect()` (`require_once`), vue qui n'inclut plus de contrôleur,
  modèle d'upload qui ne touche plus aux fichiers/session, gabarit HTML dédoublonné, code
  mort/debug retiré.
- **Points faibles restants à assumer à l'oral** : mots de passe en clair (8.1), XSS
  partiels (8.3), requêtes N+1 sur la moyenne (8.5), tri du podium (8.6), CSS en dur dans
  certaines vues (8.11), nommage mixte FR/EN (8.13), mode erreur PDO (8.14).
