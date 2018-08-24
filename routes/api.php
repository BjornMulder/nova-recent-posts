<?php

use Illuminate\Support\Facades\Route;
use Mattmangoni\RecentPosts\Helpers\ConfigResolver;
use Mattmangoni\RecentPosts\Resources\RecentPostResource;

Route::get('fetch-latest', function () {
    $options = ConfigResolver::fetch();

    $recentPosts = $options['posts_model']::with($options['author_relationship_name'])
        ->where('created_at', '>=', now()->subDays(2))
        ->take($options['posts_number'])
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json(RecentPostResource::collection($recentPosts), 200);
});
