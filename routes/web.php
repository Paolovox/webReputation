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


Route::resource('clients','ClientController');
Route::get('search', 'ClientController@search');

Route::resource('settings', 'UserController');

Route::resource('lawyers', 'LawyerController');
Route::resource('links', 'LinkController');
Route::post('links/remove','LinkController@remove');

Route::resource('documents', 'DocumentController');
Route::resource('tickets', 'TicketController');


Route::get('file/{filename}', [
        'as' => 'documents.file',
        'uses' => 'DocumentController@getFile'
        ])->where('filename', '^[^/]+$');
