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

Route::get('/', 'HomeController@index');


Route::get('/signup', function(){
   return view('pages.homepage');
});

//Login
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
//----------------------------------------------------------------------------------------------------------------------

//Logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//----------------------------------------------------------------------------------------------------------------------



//User routes
Route::get('/user', 'UserController@index');


//Admin routes
Route::get('/admin/home', 'AdminController@index');

//Customer routes
Route::get('/customer/home', 'CustomerController@index');
