<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', function () {
    // Cache::forget('posts');
    // Cache::flush();
    $posts = Cache::remember('posts', 120, function () {
        return Post::latest()->get();
    });
    return $posts;
});
