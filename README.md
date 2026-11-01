# Counter POS

A four-page Laravel point-of-sale foundation for **IT0049 TFA5: From Zero to Four Pages**. It provides a landing page, an about page, a customer directory, and a user directory. Both directories use static PHP arrays and Blade `@foreach` loops, as required by the activity.

The current scope is browsing account records. Authentication, account editing, and sales processing are outside this activity. All sample records are fictional.

## Submission links

Replace these lines before submitting:

- GitHub repository: PASTE YOUR ACTUAL REPOSITORY URL HERE
- Hosted application: PASTE YOUR ACTUAL LIVE HTTPS URL HERE

## Requirements

- PHP 8.2 or newer with the standard Laravel extensions, including mbstring, OpenSSL, PDO, and XML.
- Composer 2.
- Optional: PDO SQLite for running the included migrations and seeder.

The project uses Laravel 12 to support common PHP 8.2 installations. The assignment does not prescribe a Laravel version. Styling is served directly from `public/css/app.css`, so Node.js, npm, and Vite are not needed. The required account listings do not require a database connection.

## Local setup

Extract the project, open a terminal in its root directory, then run:

```bash
composer install
```

Copy `.env.example` to `.env`:

```powershell
copy .env.example .env
```

On macOS or Linux, use `cp .env.example .env` instead. Then run:

```bash
php artisan key:generate
php artisan serve
```

Open http://127.0.0.1:8000. On Windows, `setup-windows.bat` performs these steps and starts the server. Keep that terminal open while using the local site.

After the first Composer install, commit the generated `composer.lock` to GitHub to pin dependency versions. Exclude `.env`, `vendor`, generated cache files, and local database files through the included `.gitignore`.

## Pages and routes

| URL | Controller method | Blade view | Purpose |
| --- | --- | --- | --- |
| `/` | `PageController::home` | `home.blade.php` | Landing page and directory overview |
| `/about` | `PageController::about` | `about.blade.php` | Purpose and project information |
| `/customers` | `CustomerController::index` | `customers.blade.php` | Five customer accounts |
| `/users` | `UserController::index` | `users.blade.php` | Five user accounts |

All routes are defined in `routes/web.php`. A shared layout in `resources/views/layouts/app.blade.php` provides the navigation links and active-page state. Laravel also exposes its standard `/up` health check for hosting.

## Static data and MVC

`CustomerController` defines the static `$customers` array, and `UserController` defines the static `$users` array. Each controller passes its array to a Blade view. The views iterate over those arrays with `@foreach` and escape displayed values using `{{ }}`. The home page counts the same arrays so the overview reflects the sample data.

- Routes select the controller method for a URL.
- Controllers supply the page data.
- Blade views render the HTML.
- Eloquent models, migrations, and a database seeder are included as optional persistence foundations. They are not queried by the required account listings.

## Main files

```text
app/Http/Controllers/PageController.php
app/Http/Controllers/CustomerController.php
app/Http/Controllers/UserController.php
app/Models/Customer.php
app/Models/User.php
bootstrap/app.php
config/
database/migrations/
database/seeders/DatabaseSeeder.php
public/css/app.css
resources/views/layouts/app.blade.php
resources/views/home.blade.php
resources/views/about.blade.php
resources/views/customers.blade.php
resources/views/users.blade.php
routes/web.php
Dockerfile
docker/
render.yaml
```

## Optional database setup

Migration and seeder source files are included to satisfy the submission requirement. To create and seed an SQLite database:

```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
```

This creates five sample customers and five sample users. Seeded password hashes use randomly generated values; the application has no login screen. The required listing pages continue to read their static controller arrays.

## Verification

After installing dependencies and generating the application key:

```bash
php artisan route:list
php artisan view:cache
```

Visit every page, confirm that the top navigation works from each page, and check that each directory shows five records with the correct columns. Test the same paths on the public hosting URL. The layout also supports narrow screens and horizontally scrollable tables.

## Deployment on Render

1. Push the raw project source to a GitHub repository.
2. Create a Render **Web Service**, connect GitHub, and select that repository.
3. Choose **Docker** as the language/runtime. Keep the project root as the root directory and use `./Dockerfile`.
4. Select an available plan. The included `render.yaml` is also available for Blueprint deployment.
5. Deploy and wait for the build to complete. Composer dependencies are installed inside the image.
6. Open the assigned HTTPS URL and test all four routes.
7. Add your real repository and hosted links to the submission-links section above.

The container runs Apache on Render's `PORT` (default 10000), serves only `public/`, and enables Laravel's rewrite rules. The Docker environment uses file sessions and file caching, with `APP_DEBUG=false`; no hosted database is needed. HTTPS URL generation is enabled in production.

If no `APP_KEY` is provided, the startup script generates a temporary key. For a stable key across restarts, use `php artisan key:generate --show` locally and save the result as `APP_KEY` in Render's environment settings. Read-only sample records do not depend on persistent disk storage. Free services may sleep when idle; plan availability and account requirements depend on Render.

Official hosting reference: https://render.com/docs/deploy-php-laravel-docker

## Common errors

- **`php` is not recognized**: install PHP 8.2+ or add your existing PHP folder to PATH, then reopen the terminal.
- **`composer` is not recognized**: install Composer and reopen the terminal.
- **Missing mbstring or XML extension**: enable the named extension in the PHP configuration used by Composer.
- **No application encryption key**: run `php artisan key:generate` after creating `.env`.
- **Missing `vendor/autoload.php`**: run `composer install` in the folder that contains `artisan`.
- **SQLite errors on the required pages**: ensure `.env` has `SESSION_DRIVER=file` and `CACHE_STORE=file`, then run `php artisan config:clear`.
- **Port 8000 is occupied**: run `php artisan serve --port=8001` and open port 8001.
- **Render cannot find Dockerfile**: move the project contents to the repository root, or set Root Directory to the enclosing project folder.

## Framework references

- https://laravel.com/docs/12.x/installation
- https://laravel.com/docs/12.x/routing
- https://laravel.com/docs/12.x/blade
- https://laravel.com/docs/12.x/migrations
