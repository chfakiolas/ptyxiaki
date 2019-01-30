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
Route::get('/', 'PollsController@index');                    // Home page
Route::get('/about', 'PagesController@getAbout');            // Get about page controller
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
    Route::get('/logout', 'AdminController@logout');                  // Logout link admin
    Route::get('/admin/createpoll', 'PollsController@create');        // Create poll page
    Route::post('/admin/createpoll', 'PollsController@store');        // Create poll POST request
    Route::delete('/admin/polls/{id}', 'PollsController@destroy');
    Route::get('/admin/polls/edit/{id}', 'PollsController@edit');
    Route::post('/admin/polls/edit', 'PollsController@update');
});