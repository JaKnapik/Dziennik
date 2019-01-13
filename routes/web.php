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


Auth::routes();

Route::get('/', [
    'uses' => 'DziennikController@index',
    'as' => 'dziennik.index'
]);
//Route::get('/students', 'StudentsController@index');

Route::get('students', [
    'uses' => 'StudentsController@index',
    'as' => 'students.index'
]);
//Route::resource('dziennik', 'DziennikController');
//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('logout', [
   'uses' => 'LoginController@logout',
   'as' => 'login.logout'
]);
