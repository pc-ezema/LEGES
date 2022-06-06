<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/dashboard', 'HomePageController@home');
Route::get('/terms_conditions', 'HomePageController@terms_conditions');
Route::get('/privacy_policy', 'HomePageController@privacy_policy');

Route::get('/app', 'HomePageController@app');

Route::get('/lawyer/registration', 'HomePageController@lawyer_registration');
Route::get('/client/registration', 'HomePageController@client_registration');
Route::get('/admin/login', 'HomePageController@admin_login');

Auth::routes(['verify' => true]);

// Client & Lawyer
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/approval', 'HomeController@approval')->name('approval');
Route::get('/notifications', 'HomeController@notifications')->name('notifications');

Route::prefix('client/dashboard')->group(function () {
    Route::get('/services', 'ClientController@services')->name('client.services');
    Route::get('/services/create/case/{id}', 'ClientController@services_create_case')->name('client.services.create.case');
    Route::get('/case/details', 'ClientController@case_details')->name('client.case.details');
    Route::post('/case/save', 'ClientController@case_save')->name('client.case.save');
    Route::get('/case/confirm/{id}', 'ClientController@case_confirm')->name('client.confirm.case');
    Route::get('/case/payment/{id}', 'ClientController@redirectToGateway')->name('client.case.payment');
    Route::get('/case/delete/{id}', 'ClientController@case_delete')->name('client.case.delete');
    Route::post('/case/pay/lawyer/{id}', 'ClientController@pay_lawyer')->name('client.case.pay.lawyer');
    Route::get('/payment/callback', 'ClientController@handleGatewayCallback');
    Route::get('/profile', 'ClientController@profile')->name('client.profile');
    Route::post('/profile/profile-picture/{id}', 'ClientController@profile_picture')->name('client.profile-picture');
    Route::post('/profile/password/{id}', 'ClientController@password')->name('client.password');
    Route::post('/profile/personal-data/{id}', 'ClientController@personal_data')->name('client.personal-data');
    Route::get('/case/request/{id}', 'ClientController@case_request')->name('client.case.request');
    Route::post('/case/lawyer/accept/{id}', 'ClientController@case_lawyer_accept')->name('client.case.lawyer.accept');

    Route::get('/case/view/lawyer/{id}', 'ClientController@case_lawyer')->name('client.case.lawyer.view');
    Route::get('/transactions', 'ClientController@transactions')->name('client.transactions');
    Route::get('/notifications', 'ClientController@notifications')->name('client.notifications');
    Route::get('/notification/read/{id}', 'ClientController@read_notification')->name('client.read.notification');
});

Route::prefix('lawyer/dashboard')->group(function () {
    Route::get('/cases', 'LawyerController@cases')->name('lawyer.cases');
    Route::middleware(['approved'])->group(function () {
        Route::get('/case/details', 'LawyerController@case_details')->name('lawyer.case.details');
        Route::post('/case/request/{id}', 'LawyerController@case_request')->name('lawyer.case.request');
    });
    Route::get('/profile/{id}', 'LawyerController@profile')->name('lawyer.profile');
    Route::post('/profile/profile-picture/{id}', 'LawyerController@profile_picture')->name('lawyer.profile-picture');
    Route::post('/profile/password/{id}', 'LawyerController@password')->name('lawyer.password');
    Route::post('/profile/personal-data/{id}', 'LawyerController@personal_data')->name('lawyer.personal-data');
    Route::post('/profile/personal-data/update/{id}', 'LawyerController@personal_data_update')->name('lawyer.personal-data.update');
    Route::post('/profile/documents/{id}', 'LawyerController@documents')->name('lawyer.documents');
    Route::post('/profile/documents/update/{id}', 'LawyerController@documents_update')->name('lawyer.documents.update');
    Route::get('/notifications', 'ClientController@notifications')->name('lawyer.notifications');
    Route::get('/notification/read/{id}', 'ClientController@read_notification')->name('lawyer.read.notification');
});

// Admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/admin/lawyers', 'AdminController@lawyers')->name('admin.lawyers');
    Route::get('/admin/view/lawyer/{id}', 'AdminController@view_lawyer')->name('admin.view.lawyer');
    Route::post('admin/lawyer/password/{id}', 'AdminController@lawyer_password')->name('admin.lawyer.password');
    Route::post('admin/lawyer/profile-picture/{id}', 'AdminController@lawyer_profile_picture')->name('admin.lawyer.profile-picture');
    Route::get('/admin/delete/lawyer/{id}', 'AdminController@delete_lawyer')->name('admin.delete.lawyer');
    Route::get('/admin/clients', 'AdminController@clients')->name('admin.clients');
    Route::get('/admin/view/client/{id}', 'AdminController@view_client')->name('admin.view.client');
    Route::post('admin/client/password/{id}', 'AdminController@client_password')->name('admin.client.password');
    Route::post('admin/client/profile-picture/{id}', 'AdminController@client_profile_picture')->name('admin.client.profile-picture');
    Route::get('/admin/delete/client/{id}', 'AdminController@delete_client')->name('admin.delete.client');
    Route::get('/users/{user_id}/approve', 'AdminController@approve')->name('admin.users.approve');
    Route::get('/users/{user_id}/disapprove', 'AdminController@disapprove')->name('admin.users.disapprove'); 
    Route::get('/users/{user_id}/message', 'AdminController@message')->name('admin.users.message');
    Route::post('/users/{user_id}/send/message', 'AdminController@send_message')->name('admin.users.send.message');
    Route::get('/admin/profile', 'AdminController@profile')->name('admin.profile');  
    Route::get('/admin/update/profile-picture/{id}', 'AdminController@update_profile_picture')->name('admin.profile.picture'); 
    Route::get('/admin/update/password/{id}', 'AdminController@update_password')->name('admin.password'); 
    Route::post('/admin/add', 'AdminController@add_admin')->name('add.admin');  
    Route::get('/admin/delete/{id}', 'AdminController@delete_admin')->name('delete.admin'); 
    Route::get('/admin/transactions', 'AdminController@transactions')->name('admin.transactions');  
    Route::get('/admin/notifications', 'AdminController@notifications')->name('admin.notifications');  
    Route::get('/admin/services', 'AdminController@services')->name('admin.services');
    Route::post('/admin/add/service', 'AdminController@add_service')->name('admin.add.service'); 
    Route::post('/admin/update/service/{id}', 'AdminController@update_service')->name('admin.update.service');  
    Route::get('/admin/delete/service/{id}', 'AdminController@delete_service')->name('admin.delete.service');
    
    Route::get('/admin/cases', 'AdminController@cases')->name('admin.cases');
    Route::post('/admin/update/case/{id}', 'AdminController@update_case')->name('admin.update.case');  
    Route::get('/admin/delete/case/{id}', 'AdminController@delete_case')->name('admin.delete.case');
});