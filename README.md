please run these some artisan command first

-   php artisan key:generate
-   php artisan migrate
-   php artisan db:seed
-   php artisan passport:install

you can login with demo account that added from seeder. please check seeder file here:
/database/seeders/UserSeeder.php

for delete post after 15 days, need set up the cron job on the server to execute delete:post command
