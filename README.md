# Eloquent Relationship Demo

Welcome to the Eloquent Relationship Demo, a comprehensive guide to understanding and utilizing Eloquent relationships and database query logging in your Laravel project. This repository showcases various relationship types and provides detailed usage instructions. It allows you to grasp the power of Eloquent relationships for simplifying database querying and handling related data.

## Table of Contents

-   [Relationship Types](#relationship-types)
-   [Setup](#setup)
-   [Usage](#usage)
    -   [Create a Profile Schema and Migrate](#create-a-profile-schema-and-migrate)
    -   [Retrieve a User's Profile](#retrieve-a-users-profile)
-   [Database Query Logging](#database-query-logging)

## Relationship Types

In this project, we explore the following Eloquent relationship types:

-   One-to-One
-   One-to-Many
-   Many-to-Many
-   Has-Many-Through
-   Polymorphic Relations

## Setup

To get started with this project, follow these steps:

1. Clone this repository to your local environment:

    ```shell
    git clone https://github.com/victor90braz/eloquent-relationship-braz.git
    ```

2. Navigate to the project directory:

    ```shell
    cd eloquent-relationship
    ```

3. Install the required dependencies using Composer:

    ```shell
    composer install
    ```

4. Create a copy of the `.env` file and configure your database connection settings:

    ```shell
    cp .env.example .env
    ```

5. Generate an application key:

    ```shell
    php artisan key:generate
    ```

6. Migrate the database to create the necessary tables:

    ```shell
    php artisan migrate
    ```

## Usage

### Create a Profile Schema and Migrate

Before demonstrating the relationships, you need to create a `profile` schema and migrate it to the database. Follow these steps:

1. Create a migration for the `Profile` model:

    ```shell
    php artisan make:migration create_profiles_table
    ```

2. Open the newly created migration file at `database/migrations/yyyy_mm_dd_create_profiles_table.php` and define the schema for the `profiles` table.

3. Run the migration to create the `profiles` table:

    ```shell
    php artisan migrate
    ```

### Retrieve a User's Profile

You can retrieve a user's profile using Laravel's Eloquent relationships. Here's an example of how to do it:

1. Start a Tinker session:

    ```shell
    php artisan tinker
    ```

2. Create a new `User` instance:

    ```php
    $user = new User();
    ```

3. Retrieve a user's profile by specifying the user's ID:

    ```php
    $profile = $user->find(2)->profile;
    ```

4. You can also log the SQL queries executed by the application for debugging purposes:

    ```php
    DB::listen(function ($sql) {
        var_dump($sql->sql, $sql->bindings);
    });
    ```

For more detailed examples and usage of each relationship type, please refer to the provided code in this repository.

## Database Query Logging

To enable database query logging and view the SQL queries that are executed, you can use the `DB::listen` function as shown earlier. This is a valuable tool for debugging and analysis.

## Second Way to Log

You can also log SQL queries using the `DB::enableQueryLog` and `DB::getQueryLog` methods in your Tinker session. Here's how:

```php
> DB::enableQueryLog();
> = null

> $profile = $user->find(2);
> // SQL query and bindings will be displayed
> = App\Models.User {#7114
> ...
```

To view the logged queries, use the following code:

```php
> DB::getQueryLog();
> // An array of logged queries with query, bindings, and execution time
```

This offers an alternative approach to log SQL queries for debugging purposes.

## Next Tinker Example

You can use Tinker to interact with your models and relationships interactively for testing and debugging. An example is provided for your reference in the README.

Enjoy exploring the power of Eloquent relationships in your Laravel project!
