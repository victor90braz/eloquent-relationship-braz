# Eloquent Relationship Demo

Welcome to the Eloquent Relationship Demo, a comprehensive guide to understanding and utilizing Eloquent relationships and database query logging in your Laravel project. This repository showcases various relationship types and provides detailed usage instructions. It allows you to grasp the power of Eloquent relationships for simplifying database querying and handling related data.

## Relationship Types

I've updated the README to include the latest code snippets and examples. The README now provides a comprehensive guide for understanding and using the Eloquent relationships and database query logging in your Laravel project. You can use this updated README for your project:

Eloquent relationships in Laravel allow you to define how different database tables are related to each other. They simplify querying and working with related data.

Examples:

1. **One-to-One**: A User has one Profile.

    ```php
    // User model
    public function profile() {
        return $this->hasOne(Profile::class);
    }
    ```

2. **One-to-Many**: A User has many Posts.

    ```php
    // User model
    public function posts() {
        return $this->hasMany(Post::class);
    }
    ```

3. **Many-to-Many**: Users can belong to multiple Roles, and Roles can have multiple Users.

    ```php
    // User model
    public function roles() {
        return $this->belongsToMany(Role::class);
    }
    ```

4. **Has-Many-Through**: A Country has many Users through Cities.

    ```php
    // Country model
    public function users() {
        return $this->hasManyThrough(User::class, City::class);
    }
    ```

5. **Polymorphic Relations**: Comments can belong to both Posts and Videos.
    ```php
    // Comment model
    public function commentable() {
        return $this->morphTo();
    }
    ```

These relationships simplify database querying and make it easier to work with related data in your Laravel application.

# Database -> Tinker

\App\Models\User::factory(5)->create();
$user = new User();
$user->find(8) // user_id
$user->find(8)->posts

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
DB::enableQueryLog();
$user->find(8)->posts;
DB::getQueryLog();
```

This will display an array of logged queries with query text, bindings, and execution times, providing an alternative approach for debugging purposes.

# Create a new Post instance.

$post = new App\Models\Post()

# Find a Post with ID 1.

$post->find(1)

# Get tags related to Post with ID 1.

$post->find(1)->tags

# Retrieve tag names associated with Post ID 1.

$post->find(1)->tags->pluck('name')

# Create a new Tag instance.

$tag = new App\Models\Tag()

# Retrieve the first Tag from the database.

$tag->first()

# Get all the posts related to the first Tag.

$tag->first()->posts

# Find a Post with ID 1.

$post = new App\Models\Post()

# Find a Post with ID 1 and attach Tag ID 2 to it.

$post->find(1)->tags()->attach(2)

# more examples

$tag = new App\Models\Tag()
$tag->find(1)
$tag->find(1)->posts()->attach(2)

# delete association from post_id 1 and tag_id 2

$post->find(1)->tags()->detach(2)

# examples

$tag = App\Models\Tag::first()
$tag->posts()->attach(2)
