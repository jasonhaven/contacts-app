# Contact App - Demo

This is a demo application for managing contacts. 

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

### Requirements

1. PHP 7.3.1+
2. Laravel 5.8.4
3. MySQL

## Getting Started

```
git clone https://github.com/brndnhrbrt/contacts-app.git
cd ./contacts-app

// setup .env file for database configurations

php artisan migrate
php artisan serve

```

The application's migration scripts will take care of the SQL tables for you. As long as your .env file is set up correctly this is all you should have to do to get started.

### Setting up the .env file

```
// Sample .env database configurations

DB_CONNECTION=mysql
DB_HOST=<YOUR_DATABASE_HOST_HERE>
DB_PORT=<YOUR_DATABASE_PORT_HERE>
DB_DATABASE=<YOUR_DATABASE_NAME_HERE>
DB_USERNAME=<YOUR_DATABASE_USERNAME_HERE>
DB_PASSWORD=<YOUR_DATABASE_PASSWORD_HERE>

```
Replace all values to match the configuration on your local setup. For example, if you have a mysql database on your localhost and a database named 'contactapp' you can use the following config. Assuming your mysql user and password is root/root and port is 8889.

```
// Sample .env database configurations

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=contactapp
DB_USERNAME=root
DB_PASSWORD=root

```