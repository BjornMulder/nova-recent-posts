# Nova Recent Posts Card

## What is this package about?
This is nothing more than a simple test to get a better understanding of Nova cards development.
This will add a simple full width card in your dashboard with a list of 

 ## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require mattmangoni/nova-recent-posts
```

Next, you must register the card with Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function cards()
{
    return [
        // ...
        new \Mattmangoni\RecentPosts\RecentPosts,
    ];
}

```

This card also includes a configuration file with the following values: 

```php
    return [
        'posts_uri_key' => 'posts',
        'users_uri_key' => 'users',
        'posts_model' => 'App\Post',
        'author_relationship_name' => 'user',
        'date_format' => 'Y-m-d',
        'posts_number' => 5,
    ];
```

If you want to customize these values, make sure to publish the configuration file:

```bash
    php artisan vendor:publish --tag=recent-posts-config
```

You can then access the config file from `config/recent-posts.php`
