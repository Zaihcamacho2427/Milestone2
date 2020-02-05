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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('login');
})->name('index');

Route::get('/register', function(){
  return view('register'); 
})->name('register');

Route::get('/error', function(){
    return view('error');
})->name('error');

Route::get('/home',[ "uses" => 'AccountController@ShowHome', "as" => 'home']);
Route::get('/profile/{id}',[ "uses" => 'AccountController@ShowProfile', "as" => 'profile']);
Route::get('/profileEdit/{id}',[ "uses" => 'AccountController@ShowProfileEdit', "as" => 'profileEdit']);
Route::get('image/{filename}', 'ImageController@displayImage')->name('displayImage');
Route::get('logout', 'AccountController@logout')->name('logout');
Route::get('/userstable', 'AdminController@getUsersTable')->name('userstable');
Route::get('/admincontrol', 'AdminController@getUsersTable')->name('admincontrol');


Route::post('/refurbishUser','AccountController@refurbishUser')->name('refurbishUser');

Route::get('/suspendUser/{id}','AdminController@suspendUser');
Route::get('/unSuspendUser/{id}','AdminController@unSuspendUser');
Route::get('/terminateUser/{id}','AdminController@terminateUser');
Route::get('/suspended','AdminController@suspendedUser')->name('suspendedUser');

Route::post('/loginuser','AccountController@login');
Route::post('/registeruser','AccountController@Register');
