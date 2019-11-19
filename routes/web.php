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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('blank', 'HomeController@blank')->name('blank');
Route::get('medicals/consults', 'ConsultancyController@userhistory')->name('medicals');
Route::view('medicals/index', 'medicals/index');
Route::resource('Profile', 'ProfileController');
Route::get('userinfo', 'ProfileController@userDetails');
Route::get('profileid', 'ProfileController@getID');

Route::resource('Dependent', 'DependentController');
Route::get('userId', 'DependentController@getUser');

Route::resource('Practitionals', 'PractitionalController');
Route::get('user/{id}', 'PractitionalController@userInfo');

Route::resource('Consultancy', 'ConsultancyController');
Route::get('doctor', 'ConsultancyController@physician')->name('physician');
Route::get('consults', 'ConsultancyController@getConsult');
Route::get('userconsults', 'ConsultancyController@getUserConsult');
Route::get('getmed/{id}', 'ConsultancyController@getMed');
Route::put('cons/{id}', 'ConsultancyController@updateStatus')->name('discharge');

Route::resource('Labtest', 'LabtestController');
Route::get('tests/{id}', 'LabtestController@getLab');
Route::get('tests', 'LabtestController@getLabs');
Route::get('users', 'LabtestController@allUsers');

Route::resource('Pharmacy', 'PharmacyController');
Route::get('pharms', 'PharmacyController@getPharms');
Route::get('pham/{id}', 'PharmacyController@getPham'); 


Route::get('records/consultancy', 'ConsultancyController@history')->name('history');