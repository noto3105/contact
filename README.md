# お問い合わせフォーム
## 環境構築
Docker-build
git@github.com:coachtech-material/laravel-docker-template.git
docker-compose up -d -build

## laravel環境構築
1 docker-compose exec php bash
2 comqoser install
3 .env.exampleから.envファイルを作成し、環境変数を変更
php artisan key:generate
php artisan migrate
php artisan db:seed

## 使用技術
php
laravel
Mysql

## URL
開発環境：http://localhost/
phpMyAdmin:http://localhost:8080/
