【環境構築】 
①Dockerの構築 
docker-compose up -d --build 
②Laravelのパッケージのインストール 　
composer install 
③マイグレーション（テーブル作成）　
php artisan migrate 
④シーディング 
php artisan db:seed

【使用技術】
php:8.4.2 laravel:8.83.8 MySQL:8.0.41

ER図
![image](https://github.com/user-attachments/assets/d4158ee4-3fca-4d30-ba7a-e85560afad3b)

