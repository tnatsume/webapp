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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register', 'Auth\RegisterController@register')->name('register.create');
Route::post('register/pre_check', 'Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');
Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');

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
Route::get('changePassword','ChangePassword@showForm')->name('get.changePassword');
Route::post('changePassword', 'ChangePassword@changePassword')->name('post.changePassword');


Route::get('/user', 'UserController@index')->name('user.index');

//　本人確認書類をアップロード
Route::get('/user/{user_token}/upload', 'IdentificationController@uploadIndex')->name('uploadIndex');
Route::post('/user/{user_token}/upload', 'IdentificationController@uploadFinish')->name('uploadPost');

// オークション情報を取得
Route::get('/auctions/{token}','AuctionController@GetAuctionDeteil')->name('AuctionDetail');

// オークション情報を作成する
Route::get('/auction/create', 'AuctionController@CreateAuction')->name('CreateAuction');
Route::post('/auction/post', 'AuctionController@PostAuction')->name('PostAuction');

// オークションを落札する
Route::get('/auctions/{auction_token}/bidIndex', 'AuctionController@bidIndex')->name('bidIndex');
Route::post('/auctions/{auction_token}/bidPost' , 'AuctionController@bidPost')->name('bidPost');

// 本人確認書類を確認/更新する
// Route::get('identification/index', 'IdentificationController@');
// Route::get('identification/{index}', 'IdentificationController@';)