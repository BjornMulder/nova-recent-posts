# Nova Recent Posts Card


[![Packagist](https://img.shields.io/packagist/v/mattmangoni/nova-recent-posts.svg)](https://packagist.org/packages/mattmangoni/nova-recent-posts)

[![Total Downloads](https://img.shields.io/packagist/dt/mattmangoni/nova-recent-posts.svg?style=flat-square)](https://packagist.org/packages/mattmangoni/nova-recent-posts)

## What is this package about?

This will add a simple full width card in your dashboard with a list of recent posts.

You obviously need to have a basic blogging system already setup in order to use this.
It just need a `posts` table and a with at least `title` column in it and a one-to-many relationship with the user.

Both the `posts model` and the `relationship name` - as well as other parameters - can be altered from the card constructor.

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

        // all the parameters are optional
        new \Mattmangoni\RecentPosts\RecentPosts(
            string $authorRelationName = 'user',
            string $dateFormat = 'Y-m-d',
            int $postsNumber = 5,
            string $postModel = 'App\Post',
            string $userUriKey = 'users'
        ),
    ];
}
```
