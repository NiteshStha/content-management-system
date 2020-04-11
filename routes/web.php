<?php

use App\Http\Controllers\Blogs\PostsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::get('/blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('/blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Categories Routes
    Route::resource('/categories', 'CategoriesController');

    // Tags Routes
    Route::resource('/tags', 'TagsController');

    // Posts Routes
    Route::resource('/posts', 'PostsController');
    Route::get('/trashed-posts', 'PostsController@trashed')->name('posts.trashed');
    Route::put('/restore-post/{post}', 'PostsController@restore')->name('posts.restore');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::put('/users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::get('/users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('/users/profile', 'UsersController@update')->name('users.update-profile');
});
