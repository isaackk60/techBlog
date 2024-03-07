<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [PagesController::class, 'index']);

// // Route::resource('/blog', PostsController::class);
// // Route::get('/blog', [\App\Http\Controllers\PostsController::class, 'index'])->name('blog');

// // Define a resource route for PostsController
// Route::resource('/blog', PostsController::class);

// // Define a named route for blog index
// Route::get('/blog', [\App\Http\Controllers\PostsController::class, 'index'])->name('blog.index');

// Route::resource('/search', PostsController::class);

// // Define a named route for blog index
// Route::get('/search', [\App\Http\Controllers\PostsController::class, 'viewSearch'])->name('blog.viewSearch');

// Route::get('/blog/search', [\App\Http\Controllers\PostsController::class, 'search'])->name('blog.search');

// Auth::routes();

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Route::put('/blog/{slug}/like', [PostsController::class, 'updateLike'])->name('posts.updateLike');


// Route::put('/blog/{slug}/like', [\App\Http\Controllers\PostsController::class, 'updateLike'])->name('posts.updateLike');

// Route::put('/blog/{slug}/dislike', [\App\Http\Controllers\PostsController::class, 'updateDisLike'])->name('posts.dislike');





Route::get('/', [PagesController::class, 'index']);


Route::get('/blog/search', [PostsController::class, 'search'])->name('blog.search');
Route::get('/blog/viewSearch', [PostsController::class, 'viewSearch'])->name('blog.viewSearch');


Route::resource('/blog', PostsController::class);


Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');



Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::put('/blog/{slug}/like', [PostsController::class, 'updateLike'])->name('posts.updateLike');
Route::put('/blog/{slug}/dislike', [PostsController::class, 'updateDisLike'])->name('posts.dislike');
