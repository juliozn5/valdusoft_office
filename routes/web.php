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
});

// usuario nuevo
Route::group(['middleware' => ['auth', 'role'], 'role' => ['0']], function () {
    Route::get('home', 'HomeController@index')->name('home');
});

// administradores
Route::group(['middleware' => ['auth', 'role'], 'role' => ['1']], function () {
    Route::get('home-admin', 'HomeController@admin')->name('home.admin');
    Route::get('landing/customers', 'CustomersController@index')->name('landing.customers');
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
});