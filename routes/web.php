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

Route::get('/','UIViewController@ShowHomepage');

Route::get('/member','UIViewController@ShowMember');

// Member Function
Route::post('/register-process','UserController@RegisterProcess');
Route::post('/login-process','UserController@LoginProcess');
Route::get('/logout-process','UserController@LogoutProcess');
