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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/email/verify/{token}' , ['as' => 'email.verify' , 'uses' => 'Auth\RegisterController@verify']);
Route::resource('post' , 'PostController');
Route::get('/v{post_type}', 'PostController@index')->name('post_home');
Route::post('/post/imageUpload' , 'PostController@imageUpload');
Route::post('/post/{post}/comment' , 'PostController@comment')->name('post.comment');
Route::post('/post/search' , 'PostController@search');
Route::get('/post/search' , 'PostController@search');
Route::get('/post/{post}/zan' , 'PostController@zan')->name('post.zan');
Route::get('/post/{post}/unzan' , 'PostController@unzan')->name('post.unzan');
Route::get('/user/{user}/show' , 'UserController@show')->name('user.show');
Route::group(['middleware' => 'auth:web'], function(){
    Route::get('/user/{user}/index' , 'UserController@index')->name('user.index');
});


Route::namespace('Admin')->group(function (){
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/welcome', 'HomeController@welcome')->name('admin.welcome');
    });
});
