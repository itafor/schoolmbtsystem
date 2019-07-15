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
Route::middleware(['auth'])->group(function(){
Route::get('/dashboard/home', 'DashboardController@versionone')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');
//admin routes
Route::get('/add-students', 'AdminsController@getStudentForm')->name('addstudent');
Route::post('/edit-student-profile', 'AdminsController@editStudentProfilePix')->name('editStudentProfilePix');
Route::get('/check-student-result', 'AdminsController@checkStudentResult')->name('checkStudentResult');
Route::get('/student-profile/{id}', 'AdminsController@displayStudentDetail')->name('studentProfile');
Route::post('/update-student-profile', 'AdminsController@updateStudentProfile')->name('updateStudentProfile');
Route::post('/store-student-rank', 'AdminsController@studentsResultRanking')->name('studentsRank');


//class route
Route::get('/add-class', 'ClassesController@displayClassForm');
Route::post('/create-class', 'ClassesController@createClass')->name('createNewClass');
Route::get('/find-classteacher/{id}', 'ClassesController@findTeacher')->name('findTeacher');


//students routes
Route::get('/add-students', 'StudentsController@getStudentForm')->name('addstudent');
Route::get('/all-students', 'StudentsController@listStudent')->name('listAllStudent');
Route::post('/add-student', 'StudentsController@createStudent')->name('addNewstudent');
Route::post('/import-excel', 'StudentsController@importExcelFile')->name('importExcel');
Route::get('/show-term', 'StudentsController@getTermForm');
Route::post('/add-term', 'StudentsController@createTerm')->name('addNewTerm');
Route::post('/exportToExcel/excel', 'StudentsController@exportToExcel')->name('exportToExcel');
Route::get('/export-all-students', 'StudentsController@exportAll')->name('exportAllStudents');
Route::get('/exportToPDF', 'StudentsController@exportAsPdf')->name('exportAsPdf');
Route::get('/search', 'StudentsController@searchAction')->name('live_search');




//Teachers route
Route::get('/add-teacher', 'TeachersController@getTeacherForm');
Route::post('/create-teacher', 'TeachersController@createTeacher')->name('addNewTeacher');

//result controller
Route::get('/enter-result', 'ResultController@listStudents')->name('listAllStudents');
Route::post('/findclass/{stdClass}', 'ResultController@findClass')->name('byClass');
Route::post('/get-regno','ResultController@getRegNumber')->name('findRegNumber');
Route::get('/get-student/{stdClass}','ResultController@getStudents');
Route::post('/enter-result','ResultController@ressultFormData')->name('ressultFormData');
Route::post('/save-result','ResultController@storeResult')->name('saveResult');
Route::post('/import-result','ResultController@importResultAsExcelFile')->name('importResult');

Route::get('/update-result','ResultController@getTermSessionSubject')->name('getTermSessionSubject');

Route::post('/edit-results','ResultController@editResultsFormData')->name('editResultsFormData');
Route::post('/save-edit-results','ResultController@saveEditedResult')->name('saveEditedResult');
	
	//subject route
Route::get('/add-subject', 'ResultController@displaySubform');
Route::post('/add-subject', 'ResultController@addSubject')->name('addNewSubject');



	//sesseion route
Route::get('/add-session', 'AdminsController@displaySession');
Route::post('/add-session', 'AdminsController@addSession')->name('addNewSession');

//settings route
Route::get('/fee-settings', 'SettingsController@classSessionTerm');
Route::post('/set-fee', 'SettingsController@feessetting')->name('setFee');
Route::get('/view-fee-settings', 'SettingsController@viewFeSettings');

//payment route
Route::get('/make-payment/{id}', 'PaymentController@selectStudent');
Route::post('/store-payment', 'PaymentController@recordPayment')->name('storePamyent');
Route::get('/get-total-fee-amt/{feeclassName}/{feesessionName}/{feeterm}', 'PaymentController@fetctFeeAmount');

Route::get('/get-fee-balance/{feeclassName}/{feesessionName}/{feeterm}/{id}', 'PaymentController@fetchFeeBal');

Route::get('/view-student-payment-histories/{id}', 'PaymentController@studentPaymentHistory');

Route::get('/autocomplete/fetchskill', 'StudentsController@globalSearch')->name('autocomplete.fetchskill');

route::post('/find-student','StudentsController@findStudent')->name('findStudent');
Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
