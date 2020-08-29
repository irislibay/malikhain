#!/bin/sh

echo "🎬 entrypoint.sh"

composer dump-autoload --no-interaction --no-dev --optimize

echo "🎬 artisan commands"

php artisan cache:clear
php artisan migrate --no-interaction --force

echo "🎬 python installation"

cd scripts && ./install.sh && cd /srv/app

echo "🎬 start supervisord"

supervisord -c $LARAVEL_PATH/.deploy/config/supervisor.conf
