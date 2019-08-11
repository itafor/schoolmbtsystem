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
use App\Generalsetting;

Route::get('/', function () {
	$fetchSettings=Generalsetting::find(1);
    return view('welcome',['fetchSettings'=>$fetchSettings]);
});



Auth::routes();
Route::middleware(['auth'])->group(function(){
Route::get('/dashboard/home', 'DashboardController@allStudent')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//admin routes
Route::get('/add-students', 'AdminsController@getStudentForm')->name('addstudent');
Route::post('/edit-student-profile', 'AdminsController@editStudentProfilePix')->name('editStudentProfilePix');
Route::get('/check-student-result', 'AdminsController@checkStudentResult')->name('checkStudentResult');
Route::get('/student-profile/{id}', 'AdminsController@displayStudentDetail')->name('studentProfile');
Route::post('/update-student-profile', 'AdminsController@updateStudentProfile')->name('updateStudentProfile');
Route::post('/store-student-rank', 'AdminsController@studentsResultRanking')->name('studentsRank');

Route::get('/trash-bin', 'AdminsController@getTrachedRecords')->name('trashedRecords');

Route::get('/change-pawword', 'AdminsController@changePawword');
Route::post('/saveChangedPawword', 'AdminsController@saveChangedPawword')->name('changePassword');


//class route
Route::get('/add-class', 'ClassesController@displayClassForm');
Route::post('/create-class', 'ClassesController@createClass')->name('createNewClass');
Route::get('/find-classteacher/{id}', 'ClassesController@findTeacher')->name('findTeacher');


//students routes
Route::get('/autocomplete/fetchskill', 'StudentsController@globalSearch')->name('autocomplete.fetchskill');
route::post('/find-student','StudentsController@findStudent')->name('findStudent');
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

Route::get('/terms', 'StudentsController@displayTerm')->name('displayTerm');
Route::get('/delete-term/{id}', 'StudentsController@deleteTerm')->name('deleteTerm');
Route::get('/restore-term/{id}', 'StudentsController@restoreDeletedTerms')->name('restoreTerm');




//Teachers route
Route::get('/add-teacher', 'TeachersController@getTeacherForm');
Route::post('/create-teacher', 'TeachersController@createTeacher')->name('addNewTeacher');
Route::get('/my-profile', 'TeachersController@staffProfile');


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
Route::get('/general-settings', 'SettingsController@generalSettings');

Route::post('/save-general-settings', 'SettingsController@saveGeneralSetting')->name('generalSetting');


//payment route
Route::get('/make-payment/{id}', 'PaymentController@selectStudent');
Route::post('/store-payment', 'PaymentController@recordPayment')->name('storePamyent');
Route::get('/get-total-fee-amt/{feeclassName}/{feesessionName}/{feeterm}/{paymentiTEM}', 'PaymentController@fetctFeeAmount');
Route::get('/get-fee-balance/{feeclassName}/{feesessionName}/{feeterm}/{id}/{paymentiTEM}', 'PaymentController@fetchFeeBal');

Route::get('/view-student-payment-histories/{id}', 'PaymentController@studentPaymentHistory');
Route::get('/view-payment-history/{classes}', 'PaymentController@showPaymentHistoryByClass');
Route::get('/view-payment-history', 'PaymentController@allPaymentHistory');
Route::get('/payment-receipt/{id}', 'PaymentController@paymentReceipt');

Route::get('/make-payment', 'PaymentController@showPaystackButton');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

//notification routes
Route::post('send-notification','NotificationController@sendNotification')->name('notification.send');
Route::get('new-notification','NotificationController@newNotification');
Route::get('read-notifcation/{id}','NotificationController@viewNotification');
Route::get('mark-all-as-read','NotificationController@markAsRead')->name('markas.read');
Route::get('delete-notification/{id}','NotificationController@deleteNotification')->name('delete.notification');
Route::get('all-notifications/{id}','NotificationController@allNotification')->name('all.notification');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart/store','CartController@store')->name('cart.store');
Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}','CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}','SaveforlaterController@destroy')->name('saveForLater.destroy');
Route::post('/cart/switchToCart/{product}','SaveforlaterController@switchToCart')->name('saveforlater.store');


Route::get('/empty-cart','CartController@emptyCart');
Route::get('/empty-saved-later','CartController@emptyItemSavedForLater')->name('cart.emptyItemSavedForLater');

Route::get('/product/add','ProductController@ShowProductForm');
Route::post('/product/store','ProductController@store')->name('product.store');

});
Route::get('/products','ProductController@index');

Auth::routes();
