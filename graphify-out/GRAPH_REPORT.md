# Graph Report - .  (2026-06-02)

## Corpus Check
- 11 files · ~233,865 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 105 nodes · 110 edges · 34 communities (29 shown, 5 thin omitted)
- Extraction: 79% EXTRACTED · 21% INFERRED · 0% AMBIGUOUS · INFERRED: 23 edges (avg confidence: 0.89)
- Token cost: 5,000 input · 1,830 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Rating & Auth System|Rating & Auth System]]
- [[_COMMUNITY_User Registration & Auth|User Registration & Auth]]
- [[_COMMUNITY_Photo Feed & MVC Core|Photo Feed & MVC Core]]
- [[_COMMUNITY_Photos Per Author|Photos Per Author]]
- [[_COMMUNITY_Chart & Vote Control|Chart & Vote Control]]
- [[_COMMUNITY_Sample User Photos|Sample User Photos]]
- [[_COMMUNITY_Photo Upload|Photo Upload]]
- [[_COMMUNITY_Dev Dependencies|Dev Dependencies]]
- [[_COMMUNITY_Lightbox JS|Lightbox JS]]
- [[_COMMUNITY_Nature Photos|Nature Photos]]
- [[_COMMUNITY_Hugo Chat Roux|Hugo Chat Roux]]
- [[_COMMUNITY_Jacques Birthday|Jacques Birthday]]
- [[_COMMUNITY_Jean Photos|Jean Photos]]
- [[_COMMUNITY_Texture Assets|Texture Assets]]
- [[_COMMUNITY_Misc Images|Misc Images]]
- [[_COMMUNITY_Package JSON|Package JSON]]
- [[_COMMUNITY_Database Schema|Database Schema]]
- [[_COMMUNITY_Tests Controller|Tests Controller]]

## God Nodes (most connected - your core abstractions)
1. `vueAccueil.php (Home View)` - 7 edges
2. `accueil.php (Home Controller)` - 7 edges
3. `Session-based Authentication` - 7 edges
4. `Accueil View (vueAccueil.php)` - 7 edges
5. `DB Table: votes` - 6 edges
6. `importPhoto()` - 5 edges
7. `importRating()` - 5 edges
8. `selectAllRatings()` - 5 edges
9. `header.php (Shared Header)` - 5 edges
10. `vueInscription.php (Registration View)` - 5 edges

## Surprising Connections (you probably didn't know these)
- `Session-based Authentication` --references--> `header.php (Shared Header)`  [INFERRED]
  CLAUDE.md → application/vues/header.php
- `Session-based Authentication` --rationale_for--> `connexion.php (Login Controller)`  [INFERRED]
  CLAUDE.md → application/controleurs/connexion.php
- `Plain PHP MVC Pattern` --rationale_for--> `accueil.php (Home Controller)`  [INFERRED]
  CLAUDE.md → application/controleurs/accueil.php
- `deconnexion.php (Logout Controller)` --references--> `Session-based Authentication`  [INFERRED]
  application/controleurs/deconnexion.php → CLAUDE.md
- `ON DUPLICATE KEY UPDATE for Upsert Voting` --references--> `DB Table: votes`  [INFERRED]
  CLAUDE.md → database.sql

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Shared Lightbox Overlay DOM+JS Pattern across Views** — js_bigpic_bigpic_overlay, vues_vuepodium_podium_view, vues_vueaccueil_accueil_view [EXTRACTED 1.00]
- **Rating Model Functions (importRating, selectUserRating, selectAllRatings, top3photos)** — modeles_rating_importrating, modeles_rating_selectuserrating, modeles_rating_selectallratings, modeles_rating_top3photos [EXTRACTED 1.00]
- **Podium Feature Flow: Controller → Model → View** — controleurs_podium_podium_controller, modeles_rating_top3photos, vues_vuepodium_podium_view [EXTRACTED 1.00]

## Communities (34 total, 5 thin omitted)

### Community 0 - "Rating & Auth System"
Cohesion: 0.20
Nodes (14): Author Self-Vote Restriction (view-level), Lightbox / Big Image Overlay Pattern, Session-based Authentication, deconnexion.php (Logout Controller), Podium Controller (podium.php), bigPic Overlay Module, selectAllRatings(), selectUserRating() (+6 more)

### Community 1 - "User Registration & Auth"
Cohesion: 0.24
Nodes (11): connexion.php (Login Controller), inscription.php (Registration Controller), DB Table: communes, utilisateurs.php (User Model), addUser(), connexionOk(), getCom(), header.php (Shared Header) (+3 more)

### Community 2 - "Photo Feed & MVC Core"
Cohesion: 0.22
Nodes (8): CLAUDE.md (Project Documentation), Plain PHP MVC Pattern, accueil.php (Home Controller), note.php (Rating Controller), index.php (Entry Point), photos.php (Photos Model), obtenirPhotos(), rating.php (Rating Model)

### Community 3 - "Photos Per Author"
Cohesion: 0.36
Nodes (7): ON DUPLICATE KEY UPDATE Upsert Pattern, ON DUPLICATE KEY UPDATE for Upsert Voting, getPhotosParAuteur(), DB Table: photos, DB Table: users, DB Table: votes, importRating()

### Community 4 - "Chart & Vote Control"
Cohesion: 0.25
Nodes (8): Author Cannot Vote Own Photo (View-enforced), Chart.js from CDN for Bar Chart, Controller Embedded in View Pattern, photosParAuteur.php (Chart Controller), bigPic.js (Lightbox Script), footer.php (Shared Footer), vueAccueil.php (Home View), vuePhotosParAuteur.php (Chart View)

### Community 5 - "Sample User Photos"
Cohesion: 0.40
Nodes (6): User: Aline, User: John, Aline - Fantasy Scene with Blue Butterflies and Mushrooms, Aline - Dramatic Mountain Lake with Lightning, John - Meme Photo (John Pork Calling Screen), Apple Still Life - Dark Background

### Community 6 - "Photo Upload"
Cohesion: 0.50
Nodes (3): postPhoto.php (Photo Upload Controller), post.php (Photo Upload Model), importPhoto()

### Community 7 - "Dev Dependencies"
Cohesion: 0.50
Nodes (3): devDependencies, prettier, @prettier/plugin-php

### Community 8 - "Lightbox JS"
Cohesion: 0.50
Nodes (3): bigPic, bigPicParent, images

### Community 9 - "Nature Photos"
Cohesion: 1.00
Nodes (3): Adelouve Renard Cute - Sleeping Fox, Aline Chouette - Owl Close-Up, Jacques Route - Autumn Forest Path

### Community 10 - "Hugo Chat Roux"
Cohesion: 1.00
Nodes (3): Photo: hugo-chat_roux, Outdoor Paved Surface, Orange Tabby Cat

### Community 11 - "Jacques Birthday"
Cohesion: 0.67
Nodes (3): Birthday Cake with Candles, Birthday Celebration Theme, Jacques (Photo Author)

### Community 12 - "Jean Photos"
Cohesion: 1.00
Nodes (3): User: Jean, Jean - Fleurs (Flowers) - Sunny Spring Meadow, Jean - Larmes (Tears) - Vintage Black and White Portrait

## Knowledge Gaps
- **24 isolated node(s):** `@prettier/plugin-php`, `prettier`, `bigPic`, `bigPicParent`, `images` (+19 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **5 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vueAccueil.php (Home View)` connect `Chart & Vote Control` to `Rating & Auth System`, `User Registration & Auth`, `Photo Feed & MVC Core`?**
  _High betweenness centrality (0.076) - this node is a cross-community bridge._
- **Why does `Session-based Authentication` connect `Rating & Auth System` to `User Registration & Auth`, `Photo Upload`?**
  _High betweenness centrality (0.065) - this node is a cross-community bridge._
- **Why does `accueil.php (Home Controller)` connect `Photo Feed & MVC Core` to `Rating & Auth System`, `Chart & Vote Control`?**
  _High betweenness centrality (0.059) - this node is a cross-community bridge._
- **Are the 3 inferred relationships involving `Session-based Authentication` (e.g. with `connexion.php (Login Controller)` and `header.php (Shared Header)`) actually correct?**
  _`Session-based Authentication` has 3 INFERRED edges - model-reasoned connections that need verification._
- **Are the 4 inferred relationships involving `DB Table: votes` (e.g. with `ON DUPLICATE KEY UPDATE for Upsert Voting` and `importRating()`) actually correct?**
  _`DB Table: votes` has 4 INFERRED edges - model-reasoned connections that need verification._
- **What connects `@prettier/plugin-php`, `prettier`, `bigPic` to the rest of the system?**
  _26 weakly-connected nodes found - possible documentation gaps or missing edges._