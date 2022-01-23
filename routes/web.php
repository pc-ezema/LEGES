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

Route::get('/', 'HomePageController@index');
Route::get('/about', 'HomePageController@about');
Route::get('/contact', 'HomePageController@contact');
Route::get('/faqs', 'HomePageController@faqs');
Route::get('/teams', 'HomePageController@teams');
Route::get('/terms_conditions', 'HomePageController@terms_conditions');
Route::get('/privacy_policy', 'HomePageController@privacy_policy');

Route::get('/app', 'HomePageController@app');

Route::get('/lawyer/registration', 'HomePageController@lawyer_registration');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
