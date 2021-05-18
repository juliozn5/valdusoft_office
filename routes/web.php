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

    //LISTADO DE RUTAS PARA EL ADMINISTRADOR
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'profile'], 'profile' => ['1']], function(){
        Route::get('/', 'AdminController@index')->name('admin.index');

        //VERIFICAR SI UN CORREO YA EXISTE EN LA BASE DE DATOS
        Route::get('check-email/{email?}', 'AdminController@check_email')->name('admin.check-email');
        //MENÚ CLIENTES
        Route::group(['prefix' => 'clients'], function(){
            Route::get('/', 'ClientsController@index')->name('admin.clients');
            Route::get('create', 'ClientsController@create')->name('admin.clients.create');
            Route::get('edit/{id}', 'ClientsController@edit')->name('admin.clients.edit');
            Route::post('store', 'ClientsController@store')->name('admin.clients.store');
            Route::patch('update/{id}', 'ClientsController@update')->name('admin.clients.update');
            Route::delete('delete/{id}', 'ClientsController@delete')->name('admin.clients.delete');
        });

        //MENÚ EMPLEADOS
        Route::group(['prefix' => 'employees'], function(){
            Route::get('/', 'EmployeesController@index')->name('admin.employees');
            Route::get('create', 'EmployeesController@create')->name('admin.employees.create');
            Route::post('store', 'EmployeesController@store')->name('admin.employees.store');
            Route::get('show/{slug}/{id}', 'EmployeesController@show')->name('admin.employees.show');
            Route::post('assign-projects', 'EmployeesController@assign_projects')->name('admin.employees.assign-projects');
        });
    });
});

// usuario nuevo
Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['0']], function () {
    Route::get('home', 'HomeController@index')->name('home');
});

// administradores
Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['1']], function () {
    Route::get('landing/payroll', 'PayrollController@index')->name('landing.payroll');
    Route::get('landing/payments', 'PaymentsController@index')->name('landing.payments');
});


// trabajadores
Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['3']], function () {
    Route::get('home-employe', 'HomeController@employe')->name('home.employe');
    Route::get('landing/profile', 'ProfileController@index')->name('landing.profile');
    Route::get('landing/holidays', 'HolidaysController@index')->name('landing.holidays');
    Route::get('landing/financing', 'FinancingController@index')->name('landing.financing');
    Route::get('landing/bonds', 'BondsController@index')->name('landing.bonds');
});


// administradores y clientes
Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['1', '2']], function () {
    Route::get('landing/hosting', 'HostingController@index')->name('landing.hosting');
    Route::get('landing/hosting/create', 'HostingController@create')->name('landing.hosting-create');
    Route::get('landing/hosting/edit/{id}', 'HostingController@edit')->name('landing.hosting-edit');
    Route::post('landing/hosting/store', 'HostingController@store')->name('landing.hosting-store');
    Route::patch('landing/hosting/update/{id}', 'HostingController@update')->name('landing.hosting-update');
    Route::delete('landing/hosting/delete/{id}', 'HostingController@delete')->name('landing.hosting-delete');
});


// clientes
 Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['2']], function () {
    Route::get('home-client', 'HomeController@client')->name('home.client');
 });


// administradores, clientes y trabajadores 
Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['1', '2', '3']], function () {
    Route::get('landing/bill', 'BillController@index')->name('landing.bill');

    Route::get('landing/projects', 'ProjectsController@index')->name('landing.projects');
    Route::get('landing/projects/create', 'ProjectsController@create')->name('landing.projects-create');
    Route::get('landing/projects/edit/{id}', 'ProjectsController@edit')->name('landing.projects-edit');
    Route::post('landing/projects/store', 'ProjectsController@store')->name('landing.projects-store');
    Route::patch('landing/projects/update/{id}', 'ProjectsController@update')->name('landing.projects-update');
    Route::delete('landing/projects/delete/{id}', 'ProjectsController@delete')->name('landing.projects-delete');
});

