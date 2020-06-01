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
    return view('auth/login');
});

Route::get('/dashboard','Main_Controller@index');
Route::get('/profile','Main_Controller@profile');
Route::get('/activities','Main_Controller@activities');
Route::post('/update_info','Main_Controller@update_info');
Route::post('/add_activity','Main_Controller@add_activity');
Route::post('/change_status','Main_Controller@change_status');
Route::post('/complete','Main_Controller@complete');
Route::post('/pending','Main_Controller@pending');
Route::post('/delete','Main_Controller@delete');
Route::get('/give_remarks/{id}','Main_Controller@give_remarks')->name('give_remarks');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
