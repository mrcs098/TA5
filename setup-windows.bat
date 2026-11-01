@echo off
cd /d "%~dp0"
where php >nul 2>nul
if errorlevel 1 (
    echo PHP is not available. See START_HERE.txt for installation or hosting steps.
    pause
    exit /b 1
)
where composer >nul 2>nul
if errorlevel 1 (
    echo Composer is not available. See START_HERE.txt.
    pause
    exit /b 1
)
if not exist .env copy .env.example .env >nul
call composer install --prefer-dist --no-interaction
if errorlevel 1 (
    echo Composer failed. Copy the error message and ask for help.
    pause
    exit /b 1
)
php artisan key:generate
if errorlevel 1 exit /b 1
php artisan view:cache
if errorlevel 1 exit /b 1
php artisan route:list
echo.
echo Open http://127.0.0.1:8000 in your browser after the server starts.
php artisan serve --host=127.0.0.1 --port=8000
