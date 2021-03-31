<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
Auth::routes();

// usuarios logueado1
Route::group(['middleware'=>['auth']], function() {

    Route::get('/', 'HomeController@index')->name('index');

    Route::get('profile', 'ProfileController@edit')->name('profile');
    Route::patch('profile-update', 'ProfileController@update')->name('profile.update');

    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

});

// usuario nuevo
Route::group(['middleware' => ['auth', 'role'], 'role' => ['0']], function () {
    Route::get('home', 'HomeController@index')->name('home');
});

// administradores
Route::group(['middleware' => ['auth', 'role'], 'role' => ['1']], function () {
    Route::get('home-admin', 'HomeController@admin')->name('home.admin');
    
    Route::get('landing/clients', 'ClientsController@index')->name('landing.clients');
    Route::get('landing/clients', 'ClientsController@index')->name('landing.clients');
    Route::get('landing/clients/create', 'ClientsController@create')->name('landing.clients-create');
    Route::get('landing/clients/edit/{id}', 'ClientsController@edit')->name('landing.clients-edit');
    Route::post('landing/clients/store', 'ClientsController@store')->name('landing.clients-store');
    Route::patch('landing/clients/update/{id}', 'ClientsController@update')->name('landing.clients-update');
    Route::delete('landing/clients/delete/{id}', 'ClientsController@delete')->name('landing.clients-delete');

    Route::get('landing/employes', 'EmployesController@index')->name('landing.employes');
    Route::get('landing/payroll', 'PayrollController@index')->name('landing.payroll');
    Route::get('landing/payments', 'PaymentsController@index')->name('landing.payments');
});


// trabajadores
Route::group(['middleware' => ['auth', 'role'], 'role' => ['3']], function () {
    Route::get('home-employe', 'HomeController@employe')->name('home.employe');
    Route::get('landing/profile', 'ProfileController@index')->name('landing.profile');
    Route::get('landing/holidays', 'HolidaysController@index')->name('landing.holidays');
    Route::get('landing/financing', 'FinancingController@index')->name('landing.financing');
    Route::get('landing/bonds', 'BondsController@index')->name('landing.bonds');
});


// administradores y clientes
Route::group(['middleware' => ['auth', 'role'], 'role' => ['1', '2']], function () {
    Route::get('landing/hosting', 'HostingController@index')->name('landing.hosting');
    Route::get('landing/hosting/create', 'HostingController@create')->name('landing.hosting-create');
    Route::get('landing/hosting/edit/{id}', 'HostingController@edit')->name('landing.hosting-edit');
    Route::post('landing/hosting/store', 'HostingController@store')->name('landing.hosting-store');
    Route::patch('landing/hosting/update/{id}', 'HostingController@update')->name('landing.hosting-update');
    Route::delete('landing/hosting/delete/{id}', 'HostingController@delete')->name('landing.hosting-delete');
});


// clientes
 Route::group(['middleware' => ['auth', 'role'], 'role' => ['2']], function () {
    Route::get('home-client', 'HomeController@client')->name('home.client');
 });


// administradores, clientes y trabajadores 
Route::group(['middleware' => ['auth', 'role'], 'role' => ['1', '2', '3']], function () {
    Route::get('landing/bill', 'BillController@index')->name('landing.bill');

    Route::get('landing/projects', 'ProjectsController@index')->name('landing.projects');
    Route::get('landing/projects/create', 'ProjectsController@create')->name('landing.projects-create');
    Route::get('landing/projects/edit/{id}', 'ProjectsController@edit')->name('landing.projects-edit');
    Route::post('landing/projects/store', 'ProjectsController@store')->name('landing.projects-store');
    Route::patch('landing/projects/update/{id}', 'ProjectsController@update')->name('landing.projects-update');
    Route::delete('landing/projects/delete/{id}', 'ProjectsController@delete')->name('landing.projects-delete');
});