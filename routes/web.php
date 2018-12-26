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
});

Route::get('/users', 'UserController@index')->name('users.index')->middleware('can:list,App\User');
Route::post('/users', 'UserController@store')->name('users.store')->middleware('can:store,App\User');
Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('can:create,App\User');
Route::get('/users/{user}', 'UserController@show')->name('users.show')->middleware('can:view,user');
Route::get('/users/edit/{user}', 'UserController@edit')->name('users.edit')->middleware('can:edit,user');
Route::put('/users/update/{user}', 'UserController@update')->name('users.update')->middleware('can:update,user');
Route::delete('/users/delete/{user}', 'UserController@destroy')->name('users.destroy')->middleware('can:destroy,user');

Route::get('/counters', 'CounterController@index')->name('counters.index')->middleware('can:list,App\Counter');
Route::get('/counters/reset/{counter}', 'CounterController@reset');
Route::post('/counters', 'CounterController@store')->name('counters.store')->middleware('can:store,App\Counter');
Route::get('/counters/create', 'CounterController@create')->name('counters.create')->middleware('can:create,App\Counter');
Route::get('/counters/{counter}', 'CounterController@show')->name('counters.show')->middleware('can:view,counter');
Route::get('/counters/edit/{counter}', 'CounterController@edit')->name('counters.edit')->middleware('can:edit,counter');
Route::put('/counters/update/{counter}', 'CounterController@update')->name('counters.update')->middleware('can:update,counter');
Route::delete('/counters/delete/{counter}', 'CounterController@destroy')->name('counters.destroy')->middleware('can:destroy,counter');

Route::get('/resets', 'ResetController@index')->name('resets.index')->middleware('can:list,App\Reset');
Route::post('/resets', 'ResetController@store')->name('resets.store')->middleware('can:store,App\Reset');
Route::get('/resets/resets', 'ResetController@create')->name('resets.create')->middleware('can:create,App\Reset');
Route::get('/resets/{reset}', 'ResetController@show')->name('resets.show')->middleware('can:view,reset');
Route::get('/resets/edit/{reset}', 'ResetController@edit')->name('resets.edit')->middleware('can:edit,reset');
Route::put('/resets/update/{reset}', 'ResetController@update')->name('resets.update')->middleware('can:update,reset');
Route::delete('/resets/delete/{reset}', 'ResetController@destroy')->name('resets.destroy')->middleware('can:destroy,reset');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
