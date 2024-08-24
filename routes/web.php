<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;
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

//login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register_store');
Route::middleware('auth')->group(function () {

    Route::get('notifications/{notification}/read', [NotificationController::class, 'read'])->name('notifications.read');
});
Route::get('language/{locale}', [LanguageController::class, 'change_locale'])->name('change.locale');
Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
    // 'users' => UserController,
    'notifications' => NotificationController::class,
]);
