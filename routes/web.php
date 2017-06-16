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
})->name('root');

Route::post('/test', function () {

});

// Route::get('/test', '');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('checkRole:admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.cpanel.index');
    });
    Route::prefix('cpanel')->group(function () {
        Route::get('/', function () {
            return view('admin.cpanel.index');
        })->name('admin.cpanel.index');
        Route::get('ads', 'AdsController@index')->name('admin.cpanel.ads');
        Route::post('ads/delete/{id}', 'AdsController@delete')->name('admin.cpanel.ads.delete');
        Route::get('playlists', function () {
            return view('admin.cpanel.playlists');
        })->name('admin.cpanel.playlists');
        Route::get('screens', function () {
            return view('admin.cpanel.screens');
        })->name('admin.cpanel.screens');
        Route::get('notifications', function () {
            return view('admin.cpanel.notifications');
        })->name('admin.cpanel.notifications');
        Route::get('logs', function () {
            return view('admin.cpanel.logs');
        })->name('admin.cpanel.logs');
    });
});
Route::middleware('checkRole:user')->group(function () {
    Route::get('/cpanel', function () {
        return view('cpanel.index');
    })->name('cpanel.index');
});
Route::resource('cpanel/ads', 'AdsController', ['names' => 'cpanel.ads']);
