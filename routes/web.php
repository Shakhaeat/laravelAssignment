<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//For User Route
Route::get('users', 'UserController@index');
Route::get('users/create', 'UserController@create');
Route::post('users', 'UserController@store');
Route::get('users/{id}', 'UserController@show');
Route::get('users/{id}/edit', 'UserController@edit');
Route::patch('users/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');
Route::post('users/district', 'UserController@getDistrict');
Route::post('users/thana', 'UserController@getThana');
Route::post('users/filter', 'UserController@filter');//For user filtering
//
//For Document Route 
Route::get('document', 'DocumentController@index');
Route::get('document/create', 'DocumentController@create');
Route::post('document', 'DocumentController@store');
Route::get('document/{id}/edit', 'DocumentController@edit');
Route::patch('document/{id}', 'DocumentController@update');
Route::delete('document/{id}', 'DocumentController@destroy');
    //For file download
    Route::get('document/excel/{id}', 'DocumentController@getExcelFile');
    Route::get('document/pdf/{id}', 'DocumentController@getPdfFile');

//For User Export
Route::get('export', 'UserController@exportUser');

//For User Print
Route::get('print', 'UserController@printUser');

//For User Pdf
Route::get('pdf', 'UserController@pdfUser');