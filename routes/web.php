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
Route::get('/dashboard', 'HomePageController@home');
Route::get('/terms_conditions', 'HomePageController@terms_conditions');
Route::get('/privacy_policy', 'HomePageController@privacy_policy');

Route::get('/app', 'HomePageController@app');

Route::get('/lawyer/registration', 'HomePageController@lawyer_registration');
Route::get('/client/registration', 'HomePageController@client_registration');

Auth::routes(['verify' => true]);

// Client & Lawyer
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('client/dashboard')->group(function () {
    Route::get('/case/create', 'DashboardController@case_create')->name('client.case.create');
    Route::get('/case/details', 'DashboardController@case_details')->name('client.case.details');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
});

Route::prefix('lawyer/dashboard')->group(function () {
    Route::get('/profile', 'DashboardController@profile')->name('lawyer.profile');
});

// Admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('dashboard');
});