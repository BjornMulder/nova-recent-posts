<?php

use Illuminate\Support\Facades\Route;
use Mattmangoni\RecentPosts\RecentPosts;
use Mattmangoni\RecentPosts\Resources\RecentPostResource;
use Mattmangoni\RecentPosts\Responses\RecentPostsResponder;

Route::get('fetch-latest', function () {
    if (!Schema::hasTable(RecentPosts::getOption('postUriKey'))) {
        return RecentPostsResponder::tablesNotFound();
    }

    $recentPosts = (RecentPosts::getOption('postModel'))
        ::take(RecentPosts::getOption('postsNumber'))
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json(RecentPostResource::collection($recentPosts), 200);
});
