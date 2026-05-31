# Graph Report - .  (2026-05-31)

## Corpus Check
- 36 files · ~225,037 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 87 nodes · 84 edges · 31 communities (26 shown, 5 thin omitted)
- Extraction: 79% EXTRACTED · 21% INFERRED · 0% AMBIGUOUS · INFERRED: 18 edges (avg confidence: 0.89)
- Token cost: 9,800 input · 3,100 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Auth & Session Management|Auth & Session Management]]
- [[_COMMUNITY_Photo Management & Upload|Photo Management & Upload]]
- [[_COMMUNITY_Chart & Gallery UI|Chart & Gallery UI]]
- [[_COMMUNITY_Home Page & MVC Core|Home Page & MVC Core]]
- [[_COMMUNITY_Rating System|Rating System]]
- [[_COMMUNITY_Photo Content (Aline & John)|Photo Content (Aline & John)]]
- [[_COMMUNITY_User Data Model|User Data Model]]
- [[_COMMUNITY_Lightbox JS|Lightbox JS]]
- [[_COMMUNITY_Dev Tools & Formatting|Dev Tools & Formatting]]
- [[_COMMUNITY_Nature & Wildlife Photos|Nature & Wildlife Photos]]
- [[_COMMUNITY_Photo Content (Jean)|Photo Content (Jean)]]
- [[_COMMUNITY_Background Asset|Background Asset]]
- [[_COMMUNITY_Misc Photo Content|Misc Photo Content]]
- [[_COMMUNITY_Package Config|Package Config]]
- [[_COMMUNITY_Database Schema|Database Schema]]
- [[_COMMUNITY_Controller Tests (AST)|Controller Tests (AST)]]

## God Nodes (most connected - your core abstractions)
1. `vueAccueil.php (Home View)` - 7 edges
2. `accueil.php (Home Controller)` - 7 edges
3. `vueConnexion.php (Login View)` - 6 edges
4. `DB Table: votes` - 6 edges
5. `header.php (Shared Header)` - 5 edges
6. `vueInscription.php (Registration View)` - 5 edges
7. `DB Table: users` - 5 edges
8. `DB Table: photos` - 5 edges
9. `importRating()` - 4 edges
10. `getPhotosParAuteur()` - 4 edges

## Surprising Connections (you probably didn't know these)
- `Plain PHP MVC Pattern` --rationale_for--> `accueil.php (Home Controller)`  [INFERRED]
  CLAUDE.md → application/controleurs/accueil.php
- `ON DUPLICATE KEY UPDATE for Upsert Voting` --references--> `DB Table: votes`  [INFERRED]
  CLAUDE.md → database.sql
- `vueAccueil.php (Home View)` --implements--> `Author Cannot Vote Own Photo (View-enforced)`  [EXTRACTED]
  application/vues/vueAccueil.php → CLAUDE.md
- `Session-based Authentication` --references--> `header.php (Shared Header)`  [INFERRED]
  CLAUDE.md → application/vues/header.php
- `Session-based Authentication` --rationale_for--> `connexion.php (Login Controller)`  [INFERRED]
  CLAUDE.md → application/controleurs/connexion.php

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Home Page MVC Request Flow** — controleurs_accueil, modeles_photos, modeles_rating, vues_vueaccueil [EXTRACTED 1.00]
- **Rating Submission Flow (View → Controller → Model → DB)** — vues_vueaccueil, controleurs_note, modeles_rating_importrating, db_table_votes [EXTRACTED 1.00]
- **Photos-per-Author Chart Data Pipeline** — controleurs_photosparauteur, controleurs_photosparauteur_getphotosparauteur, vues_vuephotosparauteur, concept_chartjs_cdn [EXTRACTED 1.00]

## Communities (31 total, 5 thin omitted)

### Community 0 - "Auth & Session Management"
Cohesion: 0.36
Nodes (9): Session-based Authentication, connexion.php (Login Controller), deconnexion.php (Logout Controller), inscription.php (Registration Controller), utilisateurs.php (User Model), header.php (Shared Header), vueConnexion.php (Login View), vueInscription.php (Registration View) (+1 more)

### Community 1 - "Photo Management & Upload"
Cohesion: 0.22
Nodes (6): getPhotosParAuteur(), postPhoto.php (Photo Upload Controller), DB Table: photos, obtenirPhotos(), post.php (Photo Upload Model), importPhoto()

### Community 2 - "Chart & Gallery UI"
Cohesion: 0.25
Nodes (8): Author Cannot Vote Own Photo (View-enforced), Chart.js from CDN for Bar Chart, Controller Embedded in View Pattern, photosParAuteur.php (Chart Controller), bigPic.js (Lightbox Script), footer.php (Shared Footer), vueAccueil.php (Home View), vuePhotosParAuteur.php (Chart View)

### Community 3 - "Home Page & MVC Core"
Cohesion: 0.29
Nodes (7): CLAUDE.md (Project Documentation), Plain PHP MVC Pattern, accueil.php (Home Controller), note.php (Rating Controller), index.php (Entry Point), photos.php (Photos Model), rating.php (Rating Model)

### Community 4 - "Rating System"
Cohesion: 0.53
Nodes (5): ON DUPLICATE KEY UPDATE for Upsert Voting, DB Table: votes, importRating(), selectAllRatings(), selectUserRating()

### Community 5 - "Photo Content (Aline & John)"
Cohesion: 0.40
Nodes (6): User: Aline, User: John, Aline - Fantasy Scene with Blue Butterflies and Mushrooms, Aline - Dramatic Mountain Lake with Lightning, John - Meme Photo (John Pork Calling Screen), Apple Still Life - Dark Background

### Community 6 - "User Data Model"
Cohesion: 0.40
Nodes (5): DB Table: communes, DB Table: users, addUser(), connexionOk(), getCom()

### Community 7 - "Lightbox JS"
Cohesion: 0.50
Nodes (3): bigPic, bigPicParent, images

### Community 8 - "Dev Tools & Formatting"
Cohesion: 0.50
Nodes (3): devDependencies, prettier, @prettier/plugin-php

### Community 9 - "Nature & Wildlife Photos"
Cohesion: 1.00
Nodes (3): Adelouve Renard Cute - Sleeping Fox, Aline Chouette - Owl Close-Up, Jacques Route - Autumn Forest Path

### Community 10 - "Photo Content (Jean)"
Cohesion: 1.00
Nodes (3): User: Jean, Jean - Fleurs (Flowers) - Sunny Spring Meadow, Jean - Larmes (Tears) - Vintage Black and White Portrait

## Knowledge Gaps
- **21 isolated node(s):** `@prettier/plugin-php`, `prettier`, `bigPic`, `bigPicParent`, `images` (+16 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **5 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vueAccueil.php (Home View)` connect `Chart & Gallery UI` to `Auth & Session Management`, `Home Page & MVC Core`, `Rating System`?**
  _High betweenness centrality (0.098) - this node is a cross-community bridge._
- **Why does `accueil.php (Home Controller)` connect `Home Page & MVC Core` to `Photo Management & Upload`, `Chart & Gallery UI`, `Rating System`?**
  _High betweenness centrality (0.072) - this node is a cross-community bridge._
- **Why does `header.php (Shared Header)` connect `Auth & Session Management` to `Chart & Gallery UI`?**
  _High betweenness centrality (0.058) - this node is a cross-community bridge._
- **Are the 2 inferred relationships involving `vueConnexion.php (Login View)` (e.g. with `vueConnexion.php (Login View)` and `vueInscription.php (Registration View)`) actually correct?**
  _`vueConnexion.php (Login View)` has 2 INFERRED edges - model-reasoned connections that need verification._
- **Are the 4 inferred relationships involving `DB Table: votes` (e.g. with `ON DUPLICATE KEY UPDATE for Upsert Voting` and `importRating()`) actually correct?**
  _`DB Table: votes` has 4 INFERRED edges - model-reasoned connections that need verification._
- **What connects `@prettier/plugin-php`, `prettier`, `bigPic` to the rest of the system?**
  _23 weakly-connected nodes found - possible documentation gaps or missing edges._