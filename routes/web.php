<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// rout for profile ::::
Route::get('/profile','ProfileController@index')->name('profile');
Route::put('/profile/update','ProfileController@update')->name('profile.update');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



// route for Post :::::

Route::get('/posts','PostController@index')->name('posts');
Route::get('/posts/trashed','PostController@trashed')->name('posts.trashed');
Route::get('/post/create','PostController@create')->name('post.create');
Route::post('/post/store','PostController@store')->name('post.store');
Route::get('/post/show/{slug}','PostController@show')->name('post.show');
Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
Route::put('/post/update/{id}','PostController@update')->name('post.update');
Route::get('/post/destroy/{id}','PostController@destroy')->name('post.destroy');
Route::get('/post/hdelete/{id}','PostController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}','PostController@restore')->name('post.restore');

// route for Category :::::

Route::get('/categories','CategoryController@index')->name('categories');
Route::get('/categories/trashed','CategoryController@trashed')->name('categories.trashed');
Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category/store','CategoryController@store')->name('category.store');
Route::get('/category/show/{slug}','CategoryController@show')->name('category.show');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::put('/category/update/{id}','CategoryController@update')->name('category.update');
Route::get('/category/destroy/{id}','CategoryController@destroy')->name('category.destroy');
Route::get('/category/hdelete/{id}','CategoryController@hdelete')->name('category.hdelete');
Route::get('/category/restore/{id}','CategoryController@restore')->name('category.restore');




// route for Tags :::::

Route::get('/tags','TagController@index')->name('tags');
Route::get('/tag/create','TagController@create')->name('tag.create');
Route::post('/tag/store','TagController@store')->name('tag.store');
Route::get('/tag/edit/{id}','TagController@edit')->name('tag.edit');
Route::put('/tag/update/{id}','TagController@update')->name('tag.update');
Route::get('/tag/destroy/{id}','TagController@destroy')->name('tag.destroy');

// admin dashbord ........
    
// showLoginForm