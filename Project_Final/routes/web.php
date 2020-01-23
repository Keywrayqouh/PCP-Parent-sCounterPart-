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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/student', function () {
//     return view('student.welcome','StudentsController@welcome');
// });


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('welcome', 'PaymentController@welcome')->name('update');
Route::resource('student','PaymentController');
Route::post('/dashboard/store', 'PaymentController@store')->name('store');
// Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::get('/dele
te/{id}','PaymentController@delete');
Route::post('/update/{id}','PaymentController@update')->name('update');
Route::get('pay/{id}','PaymentController@pay')->name('pay');
// Route::get('/searchcontent','PaymentController@searchcontent')->name('searchcontent');
Route::post('/dashboard/store/{id}', 'TablePaymentController@store')->name('store');


// Route::get('/live_search', 'LiveSearch@index');
// Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

