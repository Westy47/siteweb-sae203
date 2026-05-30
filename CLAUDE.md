# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Running the project

The app runs under XAMPP. Start Apache and MySQL via the XAMPP control panel, then visit:
`http://localhost/siteweb-sae203`

`index.php` immediately redirects to `application/controleurs/accueil.php`. All pages are accessed directly through their controller paths (e.g. `http://localhost/siteweb-sae203/application/controleurs/accueil.php`).

To test the database connection independently, visit `application/controleurs/tests.php`.

## Formatting

```bash
npx prettier --write "**/*.php"
```

Prettier is configured with `@prettier/plugin-php`. No npm scripts are defined; run `npx prettier` directly.

## Database setup

`application/modeles/connect.php` is **gitignored** and must be created manually. It defines a single `connect()` function returning a PDO instance:

```php
<?php
function connect() {
    $db = new PDO("mysql:host=localhost;dbname=sae203", "root", "");
    return $db;
}
```

Database: `sae203` (MySQL). XAMPP defaults: user `root`, no password.

Tables used: `users` (alias, email, password, commune), `photos` (author_id, description, file_path, upload_date, title), `votes` (photo_id, user_id, grade), `communes`.

## Architecture

Plain PHP MVC — no framework, no autoloader, no routing library.

- **Controllers** (`application/controleurs/`) handle HTTP logic: check `$_SERVER["REQUEST_METHOD"]`, call model functions, then `require` the view or redirect.
- **Models** (`application/modeles/`) are plain PHP files with functions. Each function calls `connect()` to get a PDO handle. `connect.php` must be required before any model function that needs it.
- **Views** (`application/vues/`) are PHP/HTML templates. They use variables set by the controller (`$listePhotos`, `$userRatings`, etc.) and `require` `header.php` / `footer.php` for the shell.
- **Static assets** (`public/css/`, `public/js/`, `public/media/images/`) are referenced with relative paths like `../../public/css/global.css` from inside views.

### Request flow

```
index.php → accueil.php (controller)
               ├── require photos.php + rating.php (models)
               └── require vueAccueil.php (view)
                       ├── require header.php
                       ├── require photosParAuteur.php (controller embedded in view)
                       └── require footer.php
```

`vueAccueil.php` directly `require`s the `photosParAuteur.php` controller at the bottom of the page — this is an intentional pattern in this project.

### Session

Authentication stores `$_SESSION["pseudo"]` (username string) and `$_SESSION["userId"]` (integer). Controllers that need auth call `session_start()` themselves — there is no shared bootstrap file.

### Photo upload

`post.php::importPhoto()` replaces spaces with underscores in the title to build the filename, then moves the uploaded file to `public/media/images/<titre_compact>.jpg`. The path stored in the DB is relative to the project root (e.g. `public/media/images/foo.jpg`), and views reference it as `../../<file_path>`.

### Rating system

Users can only rate photos they did not upload (enforced in the view, not the controller). `importRating()` uses `ON DUPLICATE KEY UPDATE` so re-voting updates the existing row. The star widget submits via GET form to `note.php`, which reads `$_GET["photo_id"]` and `$_GET["rating"]`.

### Chart

The photos-per-author bar chart uses Chart.js loaded from CDN (`cdn.jsdelivr.net`). Data is injected via `json_encode` from PHP arrays built in `photosParAuteur.php`.
