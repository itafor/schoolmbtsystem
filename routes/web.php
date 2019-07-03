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
Route::get('/all-students', 'StudentsController@listStudents')->name('listAllStudents');
Route::post('/add-student', 'StudentsController@createStudent')->name('addNewstudent');
Route::post('/import-excel', 'StudentsController@importExcelFile')->name('importExcel');
Route::get('/show-term', 'StudentsController@getTermForm');
Route::post('/add-term', 'StudentsController@createTerm')->name('addNewTerm');



//Teachers route
Route::get('/add-teacher', 'TeachersController@getTeacherForm');
Route::post('/create-teacher', 'TeachersController@createTeacher')->name('addNewTeacher');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
