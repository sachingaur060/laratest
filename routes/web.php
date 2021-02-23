<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.index');
});

Route::post('/login', 'Admin\AdminController@login')->name('login');

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {

    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dash');
    
    Route::get('/user/list', 'Admin\AdminController@UserList')->name('user.list');

    Route::any('/user/edit/{id}', 'Admin\AdminController@Store')->name('user.edit');

});
