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
//Auth::routes(['verify' => true]);

/* Route::get('profile', function(){
    // Only verified users may enter...
})->middleware('verified');  */

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('blank', 'HomeController@blank')->name('blank');

Route::view('medicals/index', 'medicals/index');
Route::resource('Profile', 'ProfileController');
Route::get('userinfo', 'ProfileController@userDetails');
Route::get('profileid', 'ProfileController@getID');

Route::resource('Dependent', 'DependentController');
Route::get('userId', 'DependentController@getUser');

Route::resource('Practitionals', 'PractitionalController');
Route::get('user/{id}', 'PractitionalController@userInfo');

// route for consultancy entries
Route::resource('Consultancy', 'ConsultancyController');
Route::get('doctor', 'ConsultancyController@physician')->name('physician');
Route::get('consults', 'ConsultancyController@getConsult');
Route::get('userconsults', 'ConsultancyController@getUserConsult');
Route::get('getmed/{id}', 'ConsultancyController@getMed');
Route::put('cons/{id}', 'ConsultancyController@updateStatus')->name('discharge');

// route for laboratory test
Route::resource('Labtest', 'LabtestController');
Route::get('tests/{id}', 'LabtestController@getLab');
Route::get('tests', 'LabtestController@getLabs');
Route::get('users', 'LabtestController@allUsers');


// route for pharmacy drug despensing
Route::resource('Pharmacy', 'PharmacyController');
Route::get('pharms', 'PharmacyController@getPharms');
Route::get('pham/{id}', 'PharmacyController@getPham'); 


Route::get('records/consultancy', 'ConsultancyController@history')->name('history');

// login and registration route for medical practioners....

Route::prefix('practitioner')->group( function() {

    Route::get('/login', 'Auth\PractitionerLoginController@showLoginForm')->name('practitioner.login');
    Route::post('/login', 'Auth\PractitionerLoginController@login')->name('practitioner.login.submit');
    Route::get('/register', 'Auth\PractitionerRegisterController@showRegistrationForm')->name('practitioner.register');
    Route::post('/register', 'Auth\PractitionerRegisterController@register')->name('practitioner.register.submit');
    Route::get('/profile', 'ProfileController@create')->name('practitioner.profile');
    Route::get('/', 'PractitionerController@index')->name('practitioner.dashboard');

});

// Route for Patients medical history

Route::get('usermedhistory', 'UserMedHistoryController@userMedHistory');
Route::get('labtest/{id}', 'UserMedHistoryController@labTests');
Route::get('drugs/{id}', 'UserMedHistoryController@getDrugs');
Route::get('medpract', 'UserMedHistoryController@medPractitioners');
Route::get('medicals/consults', 'UserMedHistoryController@userhistory')->name('medicals');

// Route for Hospital 

Route::prefix('hospital')->group( function() {

    Route::get('/login', 'Auth\HospitalController@showLoginForm')->name('hospital.login');
    Route::post('/login', 'Auth\HospitalController@login')->name('hospital.login.submit');
    Route::get('/register', 'Auth\HospitalController@showRegistrationForm')->name('hospital.register');
    Route::post('/register', 'Auth\HospitalController@register')->name('hospital.register.submit');
   // Route::get('/profile', 'ProfileController@create')->name('practitioner.profile');
    Route::get('/', 'Auth\HospitalController@index')->name('hospital.dashboard');

});