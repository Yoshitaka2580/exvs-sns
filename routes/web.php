<?php

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

use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/guest', 'Auth\LoginController@guestLogin')->name('guest');
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostController');
Route::get('/search', 'PostController@searchTag')->name('tags.search');

Route::prefix('posts')->name('posts.')->group(function () {
    Route::put('/{post}/like', 'PostController@like')->name('like');
    Route::delete('/{post}/like', 'PostController@unlike')->name('unlike');
});

Route::get('/posts/tags/{name}', 'TagController@show')->name('tags.show');

Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/edit', 'UserController@edit')->name('edit');
    Route::put('/{name}', 'UserController@update')->name('update');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::put('/{name}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
});

Route::post('/posts/{post}/comment', 'CommentController@store')->name('comment.store');
Route::delete('/posts/{post}/{comment}', 'CommentController@destroy')->name('comment.destroy');
