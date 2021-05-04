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
Route::get('/url_copy','HomeController@url_copy')->name('url_copy');
Route::post('/urlshorten','PostController@urlshorten')->name('urlshorten');


Route::resource('signup', 'PostController');

Route::get('/user_registration', 'PostController@user_reg');

Route::get('/otp', 'PostController@enter_otp');

Route::post('/submitotp','PostController@submit_otp');

Route::get('/checkusername','PostController@check_username_exist')->name('check_username');;


Route::get('/', function () {
    return view('welcome');   
});


Route::get('/users/details', 'HomeController@index')->name('home');
Route::get('/users/edit/profile', 'HomeController@EditProfile')->name('edit-view');
Route::post('/users/update', 'HomeController@UpdateProfile')->name('update');


Route::get('/login', 'Auth\LoginController@showLoginFormUsers')->name('login');
Route::post('/users', 'Auth\LoginController@checklogin');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



