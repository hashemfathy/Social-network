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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::post('/signup' , 'UserController@postSignup')->name('signup');
Route::post('/signin' , 'UserController@postSignin')->name('signin');
Route::get('/logout',  'UserController@getLogout')->name('logout');
Route::get('/dashboard' , 'PostController@getDashboard')->name('dashboard')->middleware('auth');
Route::post('/createpost', 'PostController@postCreatePost')->name('create')->middleware('auth');
Route::get('/deletepost/{post_id}','PostController@getDeletePost')->name('delete')->middleware('auth');
Route::post('/edit', 'PostController@postEditPost')->name('edit');
Route::post('/like','PostController@postLikepost')->name('like');
Route::get('/account','UserController@getAccount')->name('account');
Route::post('/updateaccount', 'UserController@postSaveaccount')->name('account.save');
Route::get('/userimage/{filename}','UserController@getUserimage')->name('account.image');