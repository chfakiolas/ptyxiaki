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

Auth::routes();
Route::get('/', 'PollsController@index');                    // Home page
Route::get('/dashboard', 'DashboardController@index');       // User dashboard *allagh se dashboard
Route::get('/profile', 'DashboardController@profile');       // User profile sto dashboard
Route::get('/about', 'PagesController@getAbout');            // Get about page controller
Route::get('/createpoll', 'PollsController@create');         // Create poll page
Route::post('/createpoll', 'PollsController@store');         // create poll post request
Route::get('/contact', 'MessagesController@show');           // Contact route
Route::post('/contact', 'MessagesController@store');         // Post request για το μηνυμα
Route::get('/polls/{id}', 'PollsController@show');           // Route psifoforias
Route::post('/polls/vote', 'VotesController@store');         // Post route gia thn apostolh pshfoy
Route::get('/polls/{id}/results', 'PollsController@results');// Route apotelesmatwn psifoforias
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index');                    // Admin index page
    Route::get('/admin/users', 'AdminController@users');              // Admin users page
    Route::get('/admin/polls', 'AdminController@polls');              // Admin polls page
    Route::get('/admin/profile', 'AdminController@profile');          // Admin profile
    Route::get('/admin/messages', 'MessagesController@adminMessages');// Admin get messages route
    Route::get('/admin/newadmin', 'AdminController@newAdmin');        // New admin view
    Route::post('/admin/newadmin', 'AdminController@createAdmin');    // New admin form submit
    Route::get('/logout', 'AdminController@logout');                  // Logout link admin
});