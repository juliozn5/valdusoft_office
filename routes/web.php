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
Auth::routes();
Route::group(['middleware'=>['auth']], function() {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('users/index', 'ProfileController@index')->name('users.index');
});


// administradores
Route::group(['middleware' => ['auth', 'role'], 'role' => ['1']], function () {

    Route::get('landing/customers', 'CustomersController@index')->name('landing.customers');
    Route::get('landing/employees', 'EmployeesController@index')->name('landing.employees');
    Route::get('landing/payroll', 'PayrollController@index')->name('landing.payroll');
    Route::get('landing/payments', 'PaymentsController@index')->name('landing.payments');

});


// clientes
Route::group(['middleware' => ['auth', 'role'], 'role' => ['2']], function () {
   
    Route::get('landing/domain', 'DomainController@index')->name('landing.domain');
    
});


// trabajadores
Route::group(['middleware' => ['auth', 'role'], 'role' => ['3']], function () {
   
    Route::get('landing/profile', 'ProfileController@index')->name('landing.profile');
    Route::get('landing/holidays', 'HolidaysController@index')->name('landing.holidays');
    Route::get('landing/financing', 'FinancingController@index')->name('landing.financing');
    Route::get('landing/bonds', 'BondsController@index')->name('landing.bonds');

});


// administradores y clientes
Route::group(['middleware' => ['auth', 'role'], 'role' => ['1', '2']], function () {

    Route::get('landing/projects', 'ProjectsController@index')->name('landing.projects');
    Route::get('landing/hosting', 'HostingController@index')->name('landing.hosting');

});


// clientes y trabajadores
Route::group(['middleware' => ['auth', 'role'], 'role' => ['2', '3']], function () {
   
    Route::get('landing/dashboard', 'DashboardController@index')->name('landing.dashboard');
    
});


// administradores, clientes y trabajadores 
Route::group(['middleware' => ['auth', 'role'], 'role' => ['1', '2', '3']], function () {
   
    Route::get('landing/bill', 'BillController@index')->name('landing.bill');

});
