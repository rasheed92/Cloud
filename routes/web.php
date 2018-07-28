<?php
use Illuminate\Support\Facades\Storage;
Route::get('storage', 'FileController@getFile')->name('storage');

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

Route::get('/home', function () {
    return view('layouts.welcome2');
});
Route::get('/d', function () {
    return view('layouts.admin');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-file', ['as' => 'getFile', 'uses' => 'FileController@get_file']);
Auth::routes();
Route::post('/add','FileController@stor');
Route::post('/edit/{id}','FileController@editUser');
Route::get('/delete/{file}','FileController@delete');
Route::get('/profile/{id}','FileController@profile');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Dashboard','FileController@admin');
