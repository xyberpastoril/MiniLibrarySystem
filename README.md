# Mini Library System
 
A demo project implemented in Laravel 8 in partial fulfillment of the requirements for the course **CSci 153 - Web Systems and Technologies**.

## Requirements
- PHP Version >= 7.3<br>
**Note:** Not sure if it works on older versions, I haven't tested yet.

## Setup Guide
### 1. Clone GitHub repo for this project locally
```
git clone https://github.com/xyberpastoril/minilibrarysystem.git
```
### 2. `cd` into the `minilibrarysystem` project
```
cd minilibrarysystem
```
### 3. Install Composer Dependencies
```
composer install
```
### 4. Create a copy of `.env` file from `.env.example`. 
The `.env.example` file is already filled with default database information including the name of the database `minilibrarysystem`.
```
cp .env.example .env
```
### 5. Generate an app encryption key.
```
php artisan key:generate
```
### 6. Create an empty database named `minilibrarysystem`.
This can be done by opening XAMPP, run Apache and MySQL, then create a database to phpMyAdmin.
### 7. Update `.env` values when necessary (Optional)
Just in case your database server's configuration is different from the default `root` and blank password, or the name of the database, you may reflect those changes to the `.env` file.
### 8. Migrate and seed the database
```
php artisan migrate --seed
```
## Default Accounts
### Librarian
Email: **librarian@example.com**<br>
Password: **librarian123**

### Member
Email: **member@example.com**<br>
Password: **member123**
