@echo off
set LOG=C:\xampp\htdocs\gondar-tourism\setup-log.txt
echo === Setup started %date% %time% === >> "%LOG%"

echo --- composer install --- >> "%LOG%"
cd /d C:\xampp\htdocs\gondar-tourism
composer install >> "%LOG%" 2>&1
echo composer install exit: %ERRORLEVEL% >> "%LOG%"

echo --- composer require breeze --- >> "%LOG%"
composer require laravel/breeze --dev >> "%LOG%" 2>&1
echo breeze require exit: %ERRORLEVEL% >> "%LOG%"

echo --- breeze install --- >> "%LOG%"
php artisan breeze:install blade --no-interaction >> "%LOG%" 2>&1
echo breeze install exit: %ERRORLEVEL% >> "%LOG%"

echo --- npm install --- >> "%LOG%"
npm install >> "%LOG%" 2>&1
echo npm install exit: %ERRORLEVEL% >> "%LOG%"

echo --- npm run build --- >> "%LOG%"
npm run build >> "%LOG%" 2>&1
echo npm build exit: %ERRORLEVEL% >> "%LOG%"

echo --- php artisan key:generate --- >> "%LOG%"
php artisan key:generate --force >> "%LOG%" 2>&1
echo key generate exit: %ERRORLEVEL% >> "%LOG%"

echo --- php artisan migrate --- >> "%LOG%"
php artisan migrate --force >> "%LOG%" 2>&1
echo migrate exit: %ERRORLEVEL% >> "%LOG%"

echo === Setup finished %date% %time% === >> "%LOG%"
