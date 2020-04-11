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
    return redirect('/index');
});
Route::get('/contacts','ContactController@index')->name('contacts.index');
Route::get('/contacts/create','ContactController@create')->name('contacts.create');
Route::get('/contacts/show/{id}','ContactController@show')->name('contacts.show');
Route::post('/contacts/store','ContactController@store')->name('contacts.store');
Route::post('/contacts/update/{id}','ContactController@update')->name('contacts.update');
Route::post('/contacts/delete/{id}','ContactController@destroy')->name('contacts.delete');


//language
Route::get('languages', 'LanguageController@index')->name('language.index');
Route::get('languages/create', 'LanguageController@create')->name('language.create');
Route::post('languages', 'LanguageController@store')->name('language.store');
Route::post('languages/delete/{id}', 'LanguageController@destroy')->name('language.destroy');
Route::get('languages/show/{id}', 'LanguageController@show')->name('language.show');
Route::post('languages/update/{id}', 'LanguageController@update')->name('language.update');
Route::get('/language/{language}', 'LanguageController@switchLanguage');



//Auth::routes();




Route::get('{any}', 'HomeController@index');