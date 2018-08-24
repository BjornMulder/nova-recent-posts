<?php

namespace Mattmangoni\RecentPosts\Helpers;

class ConfigResolver
{
    public static function fetch()
    {
        if (!config('recent-posts'))
        {
            return [
                'posts_uri_key' => 'posts',
                'users_uri_key' => 'users',
                'posts_model' => 'App\Post',
                'author_relationship_name' => 'user',
                'date_format' => 'Y-m-d',
                'posts_number' => 5,
            ];
        }

        return config('recent-posts');
    }
}
