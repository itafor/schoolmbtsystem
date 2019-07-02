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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard/home', 'DashboardController@versionone')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');
//admin routes
Route::get('/add-students', 'AdminsController@getStudentForm')->name('addstudent');

//class route
Route::get('/add-class', 'ClassesController@displayClassForm');
Route::post('/create-class', 'ClassesController@createClass')->name('createNewClass');

//students routes
Route::get('/add-students', 'StudentsController@getStudentForm')->name('addstudent');
Route::post('/add-student', 'StudentsController@createStudent')->name('addNewstudent');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
