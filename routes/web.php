<?php

use Illuminate\Support\Facades\Auth;
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

// USUARIO LOGUEADO
Route::group(['middleware'=>['auth']], function() {


    Route::get('/', 'HomeController@index')->name('home');

    Route::get('profile', 'ProfileController@edit')->name('profile');
    Route::patch('profile-update', 'ProfileController@update')->name('profile.update');

    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

    Route::get('bill', 'BillController@index')->name('bill'); //facturas
    Route::get('projects', 'ProjectsController@index')->name('projects'); //detalles del proyecto


    //LISTADO DE RUTAS PARA EL ADMINISTRADOR
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'profile'], 'profile' => ['1']], function(){

        //VERIFICAR SI UN CORREO YA EXISTE EN LA BASE DE DATOS
        Route::get('check-email/{email?}', 'AdminController@check_email')->name('admin.check-email');

        Route::get('/', 'AdminController@index')->name('admin.home');

        Route::get('payroll', 'PayrollController@index')->name('payroll');
        Route::get('payments', 'PaymentsController@index')->name('payments');

        //CLIENTES CRUD
        Route::get('clients/list', 'ClientsController@list')->name('clients.list');
        Route::get('clients/create', 'ClientsController@create')->name('clients.create');
        Route::get('clients/edit/{id}', 'ClientsController@edit')->name('clients.edit');
        Route::post('clients/store', 'ClientsController@store')->name('clients.store');
        Route::patch('clients/update/{id}', 'ClientsController@update')->name('clients.update');
        Route::delete('clients/delete/{id}', 'ClientsController@delete')->name('clients.delete');

        //EMPLEADOS CRUD
        Route::get('employes/list', 'EmployesController@list')->name('employes.list');
        Route::get('employes/create', 'EmployesController@create')->name('employes.create');
        Route::post('employes/store', 'EmployesController@store')->name('employes.store');
        Route::get('employes/show/{slug}/{id}', 'EmployesController@show')->name('employes.show');
        Route::post('employes/assign-projects', 'EmployesController@assign_projects')->name('employes.assign-projects');

        //HOSTING CRUD
        Route::get('hosting', 'HostingController@index')->name('hosting.index');
        Route::get('hosting/create', 'HostingController@create')->name('hosting-create');
        Route::get('hosting/edit/{id}', 'HostingController@edit')->name('hosting-edit');
        Route::post('hosting/store', 'HostingController@store')->name('hosting-store');
        Route::patch('hosting/update/{id}', 'HostingController@update')->name('hosting-update');
        Route::delete('hosting/delete/{id}', 'HostingController@delete')->name('hosting-delete');

        //PROYECTO CRUD
        Route::get('projects/list', 'ProjectsController@list')->name('projects.list');
        Route::get('projects/create', 'ProjectsController@create')->name('projects-create');
        Route::get('projects/edit/{id}', 'ProjectsController@edit')->name('projects-edit');
        Route::post('projects/store', 'ProjectsController@store')->name('projects-store');
        Route::patch('projects/update/{id}', 'ProjectsController@update')->name('projects-update');
        Route::delete('projects/delete/{id}', 'ProjectsController@delete')->name('projects-delete');

    });


    //LISTADO DE RUTAS PARA EL CLIENTE
    Route::group(['prefix' => 'clients', 'middleware' => ['auth', 'profile'], 'profile' => ['1','2']], function(){
            
        Route::get('/', 'ClientsController@index')->name('clients.home');

        Route::get('hosting/list', 'HostingController@list')->name('hosting.list');

    });

    //LISTADO DE RUTAS PARA EL EMPLEADOS
    Route::group(['prefix' => 'employes', 'middleware' => ['auth', 'profile'], 'profile' => ['1','3']], function(){

        Route::get('/', 'EmployesController@index')->name('employes.home');

        // Route::get('profile', 'ProfileController@index')->name('profile');
        Route::get('holidays', 'HolidaysController@index')->name('holidays');
        Route::get('financing', 'FinancingController@index')->name('financing');
        Route::get('bonds', 'BondsController@index')->name('bonds');
   
    });

});





