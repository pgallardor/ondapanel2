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
})->middleware('api.simple.auth');


Route::get('login', 'AdminController@viewlogin')->name('login');
Route::post('/signin', 'AdminController@signin');

Route::middleware(['auth'])->group( function() {
    Route::get('testing', 'PagesController@getHome');
    Route::get('admins', 'AdminController@viewaddadmin');

    Route::resource('users', 'UserController');
    //Route::resource('payments', 'PaymentController');
    //payment routes
    Route::get('payments', 'PaymentController@paymentByProject');
    
    
    Route::resource('project', 'ProjectController');

    //project confirmation
    Route::post('project/{project}/{status}', 'ProjectController@changeValidation');

    //user ban
    Route::post('users/{user}/{ban}', 'UserController@setBan');

    //admin adding
    Route::post('/signup', 'AdminController@signup');

    //admin login

    //logout
    Route::post('/logout', 'AdminController@logout');
    
    //pdf payment generator
    Route::get('generate_pdf/{id}', 'CrowdController@pdfstuff');
});


//CROWDING STUFF; DELETE AFTER USING
Route::get('/add', 'CrowdController@crowdindex');

Route::get('add/user-profile', 'CrowdController@adduserprofile');
Route::post('add/adduser', 'CrowdController@postuser')->name('adduser');
Route::post('add/addprofile', 'CrowdController@postprofile')->name('addprofile');

Route::get('add/project-plan', 'CrowdController@addproject');
Route::post('add/addproject', 'CrowdController@postproject')->name('addproject');
Route::post('add/addplan', 'CrowdController@postplan')->name('addplan');
Route::post('add/addpayment', 'CrowdController@postpayment')->name('addpayment');

