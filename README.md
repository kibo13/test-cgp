## Quick Start

```bash
# download project
git clone git@github.com:kibo13/test-cgp.git

# install dependencies
composer install
npm install 

# copy file .env
copy .env.example .env

# generate secret keys 
php artisan key:generate
php artisan jwt:secret

# create a new mysql database via phpmyadmin or GUI

# import to created database file 
static/database.sql 

# database configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

# run migrations 
php artisan migrate

# create user 
php artisan db:seed --class=UserSeeder

# filling tables with test data 
php artisan db:seed

# login information
login: kibo13
password: password
```
