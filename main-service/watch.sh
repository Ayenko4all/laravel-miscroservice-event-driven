#!/bin/bash
while inotifywait -r -e modify,create,delete /var/www/html; do
  echo "Changes detected, restarting Laravel server..."
  php artisan serve --host=0.0.0.0
  php artisan queue:restart
done
