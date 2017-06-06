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
Route::post('/test', function () {
  $user = App\User::findOrFail(1);
  event(new App\Events\SmartAdsEvent($user));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
