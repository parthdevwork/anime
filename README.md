Clone project from github
git clone https://github.com/parthdevwork/anime.git

//create .env file
cp .env.example .env

//setup database name in .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=

//Run migration for create Table
php artisan migrate

//Run project
php artisan serve
