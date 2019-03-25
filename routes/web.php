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
Route::get('/', 'PollsController@index');                       // Home page
Route::get('/about', 'PagesController@getAbout');               // Get about page controller
Route::get('/contact', 'PagesController@contact');              // Contact route
Route::get('/polls/{uuid}', 'PollsController@show');            // Route psifoforias
Route::post('/polls/vote', 'VotesController@store');            // Post request gia thn apostolh pshfoy
Route::get('/polls/{uuid}/results', 'PollsController@results'); // Route apotelesmatwn psifoforias
Route::get('/polls/anon/{uuid}&{token}', 'PollsController@showAnon'); // Route για την φόρμα ανώνυμης ψηφοφορίας
Route::put('/polls/anon/vote', 'VotesController@anonStore');          // Put request για την ανώνυμη ψήφο
Route::get('/logout', 'AdminController@logout');                  // Logout link
Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->group(function () {                     // Κάνει prepend /admin στο route
        Route::get('/', 'AdminController@index');                   // Admin index page
        Route::get('/polls', 'AdminController@polls');              // Admin polls page
        Route::get('/createpoll', 'PollsController@create');        // Create poll page
        Route::post('/createpoll', 'PollsController@store');        // Create poll POST request
        Route::delete('/polls/{id}', 'PollsController@destroy');    // Request για διαγραφη/κατάργηση της ψηφοφορίας
        Route::get('/polls/edit/{id}', 'PollsController@edit');     // Edit view route
        Route::put('/polls/edit', 'PollsController@update');        // Edit put request
        Route::delete('/polls/{id}/delete', 'PollsController@destroy')->name('delete-poll'); //Delete request route
        Route::get('/polls/{uuid}/details', 'AdminController@pollDetails'); // Προβολή λεπτομερειών route
    });
});