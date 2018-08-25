<?php

use Illuminate\Support\Facades\Route;
use Mattmangoni\RecentPosts\RecentPosts;
use Mattmangoni\RecentPosts\Resources\RecentPostResource;

Route::get('fetch-latest', function () {
    if (!Schema::hasTable(RecentPosts::getOption('postUriKey'))) {
        return response()->json([], 200);
    }

    $recentPosts = (RecentPosts::getOption('postModel'))::with(RecentPosts::getOption('authorRelationName'))
        ->where('created_at', '>=', now()->subDays(2))
        ->take(RecentPosts::getOption('postsNumber'))
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json(RecentPostResource::collection($recentPosts), 200);
});
