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

Route::get('/wallet/{user_id}','UIViewController@ShowWallet');

// Member Function
Route::post('/register-process','UserController@RegisterProcess');
Route::post('/login-process','UserController@LoginProcess');
Route::get('/logout-process','UserController@LogoutProcess');


Route::get('/admin/dashboard','AdminUIViewController@ShowAdminDashboard');

// Admin Money Function

Route::get('/admin/money','AdminMoneyController@index')->name('money');

Route::get('/admin/money/create','AdminMoneyController@create');

Route::post('/admin/money','AdminMoneyController@store');

Route::get('/admin/money/{id}/edit','AdminMoneyController@edit');

Route::post('/admin/money/{id}/edit','AdminMoneyController@update');

Route::post('/admin/money/{id}','AdminMoneyController@Destroy');


// Transfer Function

Route::post('/transfer','TransferController@TransferProcess');

Route::get('/transfer-report/{user_id}','TransferController@ShowTransferReport');

Route::post('/transfer-slip-process','TransferController@TransferSlipProcess');


//Admin Transfer Function

Route::get('/admin/transfer','AdminTransferController@AdminShowTransfer')->name('transfer');

Route::get('/admin/transfer-all','AdminTransferController@AdminShowTransferAll');

Route::post('/admin/transfer/{id}/edit','AdminTransferController@AdminApproveTransfer');


// Omise Payment

Route::post('/omise-pay','OmiseController@OmisePay');
