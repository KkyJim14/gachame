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


// Admin Token Function

Route::get('/admin/token','AdminTokenController@ShowAdminToken')->name('token');

Route::get('/admin/token/create','AdminTokenController@ShowAdminCreateToken');

Route::post('/admin/token','AdminTokenController@AdminCreateTokenProcess');

Route::get('/admin/token/{id}/edit','AdminTokenController@ShowAdminEditToken');

Route::post('/admin/token/{id}/edit','AdminTokenController@AdminEditTokenProcess');

Route::post('/admin/token/{id}','AdminTokenController@AdminDeleteTokenProcess');

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

// Token Transfer

Route::post('/token-transfer','TokenTransferController@TokenTransferProcess');

Route::post('/token-transfer-manual','TokenTransferController@TokenTransferManualProcess');

// Admin Product Function

Route::get('/admin/product','AdminProductController@ShowAdminProduct')->name('product');

Route::get('/admin/product/create','AdminProductController@ShowAdminCreateProduct');

Route::post('/admin/product','AdminProductController@AdminCreateProductProcess');

Route::get('/admin/product/{id}/edit','AdminProductController@ShowAdminEditProduct');

Route::post('/admin/product/{id}/edit','AdminProductController@AdminEditProductProcess');

Route::post('/admin/product/{id}','AdminProductController@AdminDeleteProductProcess');


// Admin Gachapon Function

Route::get('/admin/gachapon','AdminGachaponController@ShowAdminGachapon')->name('gachapon');

Route::get('/admin/gachapon/create','AdminGachaponController@ShowAdminCreateGachapon');

Route::post('/admin/gachapon','AdminGachaponController@AdminCreateGachaponProcess');

Route::get('/admin/gachapon/{id}/edit','AdminGachaponController@ShowAdminEditGachapon');

Route::post('/admin/gachapon/{id}/edit','AdminGachaponController@AdminEditGachaponProcess');

Route::post('/admin/gachapon/{id}','AdminGachaponController@AdminDeleteGachaponProcess');

// Admin ProductInGachapon Function

Route::get('/admin/product-in-gachapon','AdminProductInGachaponController@ShowAdminProductInGachapon')->name('product-in-gachapon');

Route::get('/admin/product-in-gachapon/create','AdminProductInGachaponController@ShowAdminCreateProductInGachapon');

Route::post('/admin/product-in-gachapon','AdminProductInGachaponController@AdminCreateProductInGachaponProcess');

Route::get('/admin/product-in-gachapon/{id}/edit','AdminProductInGachaponController@ShowAdminEditProductInGachapon');

Route::post('/admin/product-in-gachapon/{id}/edit','AdminProductInGachaponController@AdminEditProductInGachaponProcess');

Route::post('/admin/product-in-gachapon/{id}','AdminProductInGachaponController@AdminDeleteProductInGachaponProcess');
