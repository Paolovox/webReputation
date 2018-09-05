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

Route::get('/', 'HomeController@index');

Route::resource('settings', 'UserController');

Route::resource('platforms','PlatformController');
Route::resource('keywords', 'KeywordController');
Route::resource('searches', 'SearchController');
Route::resource('results', 'ResultController');

// Autocomplete keywords: ritorna un json con tutte le keywords simili al parametro "term" (default di jQuery)
Route::get('autocomplete/keywords', 'KeywordController@autocomplete');



/**** (Fabrizio) DA QUI IN POI NON SO CHE ROBA È: ****/

Route::get('search', 'PlatformController@search');  # ???

Route::resource('links', 'LinkController');
Route::post('links/remove','LinkController@remove');

Route::resource('documents', 'DocumentController');
Route::resource('tickets', 'TicketController');

Route::get('file/{filename}', [
    'as' => 'documents.file',
    'uses' => 'DocumentController@getFile'
])->where('filename', '^[^/]+$');
