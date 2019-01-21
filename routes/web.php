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

Route::get('/dziennik', [
    'uses' => 'DziennikController@index',
    'as' => 'dziennik.index'
]);
//Route::get('/students', 'StudentsController@index');
Route::get('messagesReceived{id}', [
    'uses' => 'MessagesController@showReceived',
    'as' => 'messages.showReceived'
]);
Route::get('messagesSent{id}', [
    'uses' => 'MessagesController@showSent',
    'as' => 'messages.showSent'

]);

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

Route::get('createStudent', [
    'uses' => 'StudentsController@create',
    'as' => 'student.create'
]);

Route::post('storeStudent', [
    'uses' => 'StudentsController@store',
    'as' => 'student.store'
]);

Route::get('deleteStudent{student}', [
    'uses' => 'StudentsController@destroy',
    'as' => 'student.destroy'
]);

Route::get('editStudent{student}', [
    'uses' => 'StudentsController@edit',
    'as' => 'student.edit'
]);

Route::put('student{student}', [
    'uses' => 'StudentsController@update',
    'as' => 'student.update'
]);
