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

Route::get('sendMessage{nameSurname}', [
    'uses' => 'MessagesController@create',
    'as' => 'messages.create'

]);

Route::post('sendMessage{nameSurname}', [
    'uses' => 'MessagesController@store',
    'as' => 'messages.store'

]);

Route::get('messageToMany', [
    'uses' => 'MessagesController@index',
    'as' => 'messages.toMany'

]);
Route::post('resetSelected', [
    'uses' => 'MessagesController@resetSelect',
    'as' => 'messages.reset'

]);

Route::post('sendToMany', [
    'uses' => 'MessagesController@sendToMany',
    'as' => 'messages.sendToMany'

]);

Route::post('deleteFromList', [
    'uses' => 'MessagesController@deleteFromList',
    'as' => 'messages.deleteFromList'

]);
Route::post('storeToMany', [
    'uses' => 'MessagesController@storeToMany',
    'as' => 'messages.storeToMany'

]);


Route::post('searchToSend','MessagesController@search');


Route::get('students', [
    'uses' => 'StudentsController@index',
    'as' => 'students.index'
]);
Route::get('paski', [
    'uses' => 'PaskiController@index',
    'as' => 'paski.index'
]);
//Route::resource('dziennik', 'DziennikController');
//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('presenceIndex{nameSurname}', [
   'uses' => 'PresenceController@index',
   'as' => 'presence.index'
]);
Route::get('gradesShow{id}', [
   'uses' => 'GradesController@show',
   'as' => 'grades.show'
]);
Route::get('userGrades{id}', [
    'uses' => 'GradesController@showUser',
    'as'=> 'grades.showUser'
]);
Route::get('gradesIndex{nameSurname}', [
    'uses' => 'GradesController@index',
    'as' => 'grades.index'
]);
Route::post('gradesStore', [
   'uses'=> 'GradesController@store',
   'as' => 'grades.store'
]);
Route::get('logout', [
   'uses' => '\App\Http\Controllers\Auth\LoginController@logout',
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
Route::get('gradeDestroy{grade}', [
    'uses' => 'GradesController@destroy',
    'as' => 'grades.destroy'
]);
Route::get('deleteStudent{student}', [
    'uses' => 'StudentsController@destroy',
    'as' => 'student.destroy'
]);
Route::get('editGrade{grade}', [
    'uses' => 'GradesController@edit',
    'as' => 'grades.edit'
]);
Route::get('editStudent{student}', [
    'uses' => 'StudentsController@edit',
    'as' => 'student.edit'
]);
Route::put('grade{grade}', [
    'uses' => 'GradesController@update',
    'as' => 'grades.update'
]);
Route::get('editPass{id}', [
    'uses' => 'StudentsController@passEdit',
    'as' => 'student.passEdit'
]);
Route::put('passUp{id}', [
   'uses' => 'StudentsController@passUpdate',
   'as' => 'student.passUp'
]);
Route::put('student{student}', [
    'uses' => 'StudentsController@update',
    'as' => 'student.update'
]);
