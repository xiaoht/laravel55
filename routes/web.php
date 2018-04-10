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
Route::post('/post/comment/{post}' , 'PostController@comment')->name('post.comment');
Route::get('/post/zan/{post}' , 'PostController@zan')->name('post.zan');
Route::get('/post/unzan/{post}' , 'PostController@unzan')->name('post.unzan');