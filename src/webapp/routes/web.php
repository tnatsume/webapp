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
// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/register', 'Auth\RegisterController@register')->name('register.create');
// Route::post('register/pre_check', 'Auth\RegisterController@pre_check')->name('register.pre_check');
// Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');
// Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
// Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');

Route::get('/', 'UserController@index');

/** Login,Logout,ResetPassword,ForgetPassword */
Auth::routes();
Route::get('/home', 'UserController@index')->name('home');
Route::post('register/pre_check', 'Auth\RegisterController@preCheck')->name('register.pre_check');
// 本会員登録入力
Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');
Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');

// パスワード変更
Route::get('changePassword','Auth\ChangePassword@showForm')->name('get.changePassword');
Route::post('changePassword', 'Auth\ChangePassword@changePassword')->name('post.changePassword');


Route::get('/user', 'UserController@index')->name('user.index');

//　本人確認書類をアップロード
Route::get('/user/{user_token}/upload', 'UserController@uploadIndex')->name('uploadIndex');
Route::get('/user/{user_token}/upload', 'UserController@uploadCOnfirm')->name('uploadConfirm');
Route::post('/user/{user_token}/upload', 'UserController@uploadFinish')->name('uploadFinish');

// オークション情報を取得
Route::get('/auction', 'AuctionController@GetAuctionList')->name('AuctionList');
ROute::get('/auction/{token}','AuctionController@GetAuctionDeteil')->name('AuctionDetail');

// オークション情報を作成する
Route::get('/auction_/create', 'AuctionController@CreateAuction')->name('CreateAuction');
// オークションを落札する
// Route::post('/auction/')