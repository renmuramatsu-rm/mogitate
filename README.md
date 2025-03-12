【環境構築】 
①Dockerの構築 
docker-compose up -d --build 
②Laravelのパッケージのインストール 　
composer install 
③マイグレーション（テーブル作成）　
php artisan migrate 
④シーディング 
php artisan make:seeder CategoriesTableSeeder 
php artisan make:seeder ContactsTableSeeder 
php artisan db:seed
