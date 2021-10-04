# NeonKnights

## Installation

Requires Laravel 8+ and PHP 8.0+.

### Step 1: Check Required Applications are Installed

NeonKnights requires a PHP database to run. As usch, a PHP server such as [XAMPP](https://www.apachefriends.org/index.html) with a MySQL database must be running during the setup and operation of the program. The optional Mongo driver for PHP is also required. Instructions on how it can be installed are detailed [here](https://www.php.net/manual/en/set.mongodb.php).

### Step 2: Install the requried Packages

NeonKnights uses both PHP and React for it's front and backend, which requires certain packages that have been used throughout the project. After retreiving the branch and setting up the PHP server and Mongo driver, please run:

```
composer install
npm install
```


### Step 3: Environment Setup

We have an '.env' template file available that resolves almost all required variables. To set it up, use the following commands in your terminal:
```
cp .env.example .env
php artisan key:generate
```
>You will also need to provide data for the following .env variables: `MAIL_USERNAME=` `MAIL_PASSWORD=` `DB_DSN_MONGO=` `DB_DATABASE_MONGO=` 


### Step 4: Database Preperation

Run the migrations for the database:

`php artisan migrate`


### Step 5: API Preperation

You will also need to prepare the Passport API access tokens, which can be done with the following terminal command:

`php artisan passport:install`


### Additional steps

#### Database Seeding

If you would like to have a mock database set up for users, games, game weeks, actions, and the like, you can run the seeder to populate some data. Please make sure that you are not overwriting any data you may have in a selected database before running this command:
`php artisan db:seed`
