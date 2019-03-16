# Contact App - Demo

This is a demo application for managing contacts

Features:

- [x] Uses the latest Laravel version (5.8.4)
- [x] Uses MySQL 
- [x] Field Validation
- [x] Utilizes Bootstrap
- [x] Create, edit and delete contacts
- [x] Search for contacts
- [x] Sort contacts
- [x] Paginate contacts
- [x] View contact's location with Google Maps and Google's geocoding API
- [x] Customized map marker

### Requirements

1. PHP 7.3.1+
2. Laravel 5.8.4
3. MySQL
4. Composer

## Getting Started

```
git clone https://github.com/brndnhrbrt/contacts-app.git
cd ./contacts-app
composer install
cp .env.example .env

// setup .env file for database configurations (see below)

php artisan migrate
php artisan serve

// navigate to http://localhost:8000/ in your browser

```

The application's migration scripts will take care of the SQL tables for you. As long as your .env file is set up correctly this is all you should have to do to get started.

### Setting up the .env file

**Please note:** You will have to create a MySQL database for this application. You can use the following SQL code to create the database

```
CREATE DATABASE contactapp;
```

You must set the APP_KEY and DB values to start the app successfully  

```

// Sample APP_KEY

APP_KEY=<APP_KEY_GOES_HERE>

// Sample DB Values

DB_CONNECTION=mysql
DB_HOST=<YOUR_DATABASE_HOST_HERE>
DB_PORT=<YOUR_DATABASE_PORT_HERE>
DB_DATABASE=<YOUR_DATABASE_NAME_HERE>
DB_USERNAME=<YOUR_DATABASE_USERNAME_HERE>
DB_PASSWORD=<YOUR_DATABASE_PASSWORD_HERE>

```

Replace all values to match the configuration on your local setup. For example, if you have a mysql database on your localhost and a database named 'contactapp' you can use the following config. Assuming your mysql user and password is root/root and port is 8889. APP_KEY for this example is base64:/2NO/gm92XP/mq+ec390EBJ05NurJXsaKxtDQ+zgMCc=

```

APP_KEY=base64:/2NO/gm92XP/mq+ec390EBJ05NurJXsaKxtDQ+zgMCc=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=contactapp
DB_USERNAME=root
DB_PASSWORD=root

```

## Screenshots

![Example 1](https://brndnhrbrt.github.io/img/contacts-1.png)
![Example 2](https://brndnhrbrt.github.io/img/contacts-2.png)