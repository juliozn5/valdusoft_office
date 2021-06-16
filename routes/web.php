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
Auth::routes();

// usuarios logueado
Route::group(['middleware'=>['auth']], function() {

            Route::get('/', 'HomeController@index')->name('home');

            Route::get('profile', 'ProfileController@edit')->name('profile');
            Route::patch('profile-update', 'ProfileController@update')->name('profile.update');

            Route::get('change-password', 'ChangePasswordController@index');
            Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

        //LISTADO DE RUTAS PARA EL ADMINISTRADOR
        Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'profile'], 'profile' => ['1']], function(){

            Route::get('/', 'AdminController@index')->name('admin.home');

            //VERIFICAR SI UN CORREO YA EXISTE EN LA BASE DE DATOS
            Route::get('check-email/{email?}', 'AdminController@check_email')->name('admin.check-email');


            Route::get('payroll', 'PayrollController@index')->name('payroll');
            Route::get('payments', 'PaymentsController@index')->name('payments');

        });


        //LISTADO DE RUTAS PARA EL CLIENTE
        Route::group(['prefix' => 'clients', 'middleware' => ['auth', 'profile'], 'profile' => ['1','2']], function(){

            //MENÚ CLIENTES
            Route::get('/', 'ClientsController@index')->name('clients.home');
            Route::get('create', 'ClientsController@create')->name('admin.clients.create');
            Route::get('edit/{id}', 'ClientsController@edit')->name('admin.clients.edit');
            Route::post('store', 'ClientsController@store')->name('admin.clients.store');
            Route::patch('update/{id}', 'ClientsController@update')->name('admin.clients.update');
            Route::delete('delete/{id}', 'ClientsController@delete')->name('admin.clients.delete');

            // Route::get('home-client', 'HomeController@client')->name('client.home');

   
        });

        //LISTADO DE RUTAS PARA EL EMPLEADOS
        Route::group(['prefix' => 'employes', 'middleware' => ['auth', 'profile'], 'profile' => ['1','3']], function(){

            //MENÚ EMPLEADOS
            Route::get('/', 'EmployesController@index')->name('employes.home');
            Route::get('create', 'EmployesController@create')->name('admin.employes.create');
            Route::post('store', 'EmployesController@store')->name('admin.employes.store');
            Route::get('show/{slug}/{id}', 'EmployesController@show')->name('admin.employes.show');
            Route::post('assign-projects', 'EmployesController@assign_projects')->name('admin.employes.assign-projects');

            // Route::get('home-employes', 'HomeController@employes')->name('home.employes');
            Route::get('profile', 'ProfileController@index')->name('profile');
            Route::get('holidays', 'HolidaysController@index')->name('holidays');
            Route::get('financing', 'FinancingController@index')->name('financing');
            Route::get('bonds', 'BondsController@index')->name('bonds');
   
        });

        //LISTADO DE RUTAS PARA EL USUARIO NUEVO
        // Route::group(['prefix' => 'new', 'middleware' => ['auth', 'profile'], 'profile' => ['0']], function(){

        //     Route::get('/', 'HomeController@index')->name('home');
   
        // });



        // administradores y clientes
        Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['1','2']], function () {

            Route::get('hosting', 'HostingController@index')->name('hosting');
            Route::get('hosting/create', 'HostingController@create')->name('hosting-create');
            Route::get('hosting/edit/{id}', 'HostingController@edit')->name('hosting-edit');
            Route::post('hosting/store', 'HostingController@store')->name('hosting-store');
            Route::patch('hosting/update/{id}', 'HostingController@update')->name('hosting-update');
            Route::delete('hosting/delete/{id}', 'HostingController@delete')->name('hosting-delete');

        });




        // administradores, clientes y trabajadores 
        Route::group(['middleware' => ['auth', 'profile'], 'profile' => ['1','2','3']], function () {

            Route::get('bill', 'BillController@index')->name('bill');
            Route::get('projects', 'ProjectsController@index')->name('projects');
            Route::get('projects/create', 'ProjectsController@create')->name('projects-create');
            Route::get('projects/edit/{id}', 'ProjectsController@edit')->name('projects-edit');
            Route::post('projects/store', 'ProjectsController@store')->name('projects-store');
            Route::patch('projects/update/{id}', 'ProjectsController@update')->name('projects-update');
            Route::delete('projects/delete/{id}', 'ProjectsController@delete')->name('projects-delete');
        });

});





