<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PageController::class, 'main'])->name('main');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/project', [PageController::class, 'project'])->name('project');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');



// Route::get('posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('posts/{posts}', [PostController::class, 'show'])->name('posts.show');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('posts/create', [PostController::class, 'store'])->name('posts.store');
// Route::get('posts/{posts}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('posts/{posts}/edit', [PostController::class, 'update'])->name('posts.update');
// Route::delete('posts/{posts}/delete', [PostController::class, 'delete'])->name('posts.delete');

// Route::resource('posts', PostController::class);
// Route::resource('comments', CommentController::class);

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
    // 'users' => UserController,
]);
