<?php

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mattmangoni\RecentPosts\Resources\RecentPostResource;

/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/

Route::get('fetch-latest', function () {
    $recentPosts = Post::with('author')
        ->where('created_at', '>=', now()->subDays(2))
        ->take(5)
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json(RecentPostResource::collection($recentPosts), 200);
});
