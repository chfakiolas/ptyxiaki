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
Route::get('/polls/{uuid}', 'PollsController@show');           // Route psifoforias
Route::post('/polls/vote', 'VotesController@store');         // Post route gia thn apostolh pshfoy
Route::get('/polls/{uuid}/results', 'PollsController@results');// Route apotelesmatwn psifoforias

Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->group(function () {                     // Κάνει prepend /admin στο route
        Route::get('/', 'AdminController@index');                   // Admin index page
        Route::get('/users', 'AdminController@users');              // Admin users page
        Route::get('/polls', 'AdminController@polls');              // Admin polls page
        Route::get('/profile', 'AdminController@profile');          // Admin profile
        Route::get('/messages', 'MessagesController@adminMessages');// Admin get messages route
        Route::get('/createpoll', 'PollsController@create');        // Create poll page
        Route::post('/createpoll', 'PollsController@store');        // Create poll POST request
        Route::delete('/polls/{id}', 'PollsController@destroy');    //
        Route::get('/polls/edit/{id}', 'PollsController@edit');     // Edit view route
        Route::put('/polls/edit', 'PollsController@update');        // Edit put request
        Route::delete('/polls/{id}/delete', 'PollsController@destroy')->name('delete-poll'); //Delete request route
    });

    Route::get('/logout', 'AdminController@logout');                  // Logout link admin 
});