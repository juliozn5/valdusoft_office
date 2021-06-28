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

    //LISTADO DE RUTAS PARA EL ADMINISTRADOR
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'profile'], 'profile' => ['1']], function(){
        Route::get('/', 'AdminController@index')->name('admin.home');
        //VERIFICAR SI UN CORREO YA EXISTE EN LA BASE DE DATOS
        Route::get('check-email/{email?}', 'AdminController@check_email')->name('admin.check-email');

        //MÓDULO DE PROYECTOS
        Route::group(['prefix' => 'projects'], function(){
            Route::get('/', 'ProjectsController@list')->name('admin.projects.list');
            Route::get('create', 'ProjectsController@create')->name('admin.projects.create');
            Route::get('show/{slug}/{id}', 'ProjectsController@show')->name('admin.projects.show');
            Route::post('store', 'ProjectsController@store')->name('admin.projects.store');
            Route::patch('update/{id}', 'ProjectsController@update')->name('admin.projects.update');
            Route::delete('delete/{id}', 'ProjectsController@delete')->name('admin.projects.delete');
            Route::post('assign-members', 'ProjectsController@assign_members')->name('admin.projects.assign-members');
            Route::post('assign-technologies', 'ProjectsController@assign_technologies')->name('admin.projects.assign-technologies');
            Route::post('add-attachment', 'ProjectsController@add_attachment')->name('admin.projects.add-attachment');
            Route::post('update-attachment', 'ProjectsController@update_attachment')->name('admin.projects.update-attachment');
            Route::delete('delete-attachment/{id}', 'ProjectsController@delete_attachment')->name('admin.projects.delete-attachment');
            Route::post('add-accounting-transaction', 'ProjectsController@add_accounting_transaction')->name('admin.projects.add-accounting-transaction');
            Route::post('update-accounting-transaction', 'ProjectsController@update_accounting_transaction')->name('admin.projects.update-accounting-transaction');
        });

         //MÓDULO DE CLIENTES
        Route::group(['prefix' => 'clients'], function(){
            Route::get('/', 'ClientsController@list')->name('admin.clients.list');
            Route::get('/detail', 'ClientsController@detail')->name('admin.clients.detail');
            Route::get('create', 'ClientsController@create')->name('admin.clients.create');
            Route::get('edit/{id}', 'ClientsController@edit')->name('admin.clients.edit');
            Route::post('store', 'ClientsController@store')->name('admin.clients.store');
            Route::patch('update/{id}', 'ClientsController@update')->name('admin.clients.update');
            Route::delete('delete/{id}', 'ClientsController@delete')->name('admin.clients.delete');
        });

        //MÓDULO DE EMPLEADOS
        Route::group(['prefix' => 'employees'], function(){
            Route::get('/', 'EmployeesController@list')->name('admin.employees.list');
            Route::get('create', 'EmployeesController@create')->name('admin.employees.create');
            Route::post('store', 'EmployeesController@store')->name('admin.employees.store');
            Route::get('show/{slug}/{id}', 'EmployeesController@show')->name('admin.employees.show');
            Route::post('assign-projects', 'EmployeesController@assign_projects')->name('admin.employees.assign-projects');
        });

        //MÓDULO DE HOSTINGS
        Route::group(['prefix' => 'hostings'], function(){
            Route::get('/', 'HostingController@list')->name('admin.hostings.list');
            Route::get('create', 'HostingController@create')->name('admin.hostings.create');
            Route::get('edit/{id}', 'HostingController@edit')->name('admin.hostings.edit');
            Route::post('store', 'HostingController@store')->name('admin.hostings.store');
            Route::patch('update/{id}', 'HostingController@update')->name('admin.hostings.update');
            Route::delete('delete/{id}', 'HostingController@delete')->name('admin.hostings.delete');
        });

        //MÓDULO FINANCIERO
        Route::group(['prefix' => 'financial'], function(){
            //MÓDULO FINANCIERO - FACTURAS
            Route::group(['prefix' => 'bills'], function(){
                Route::get('/', 'BillController@list')->name('admin.bills.list');
            });

            //MÓDULO FINANCIERO - NÓMINA
            Route::group(['prefix' => 'payroll'], function(){
                Route::get('/', 'PayrollController@list')->name('admin.payrolls.list');
            });

            //MÓDULO FINANCIERO - PAGOS
            Route::group(['prefix' => 'payments'], function(){
                Route::get('/', 'PaymentsController@list')->name('admin.payments.list');
            });
        });
    });

    //LISTADO DE RUTAS PARA EL CLIENTE
    Route::group(['prefix' => 'client', 'middleware' => ['auth', 'profile'], 'profile' => ['2']], function(){
        Route::get('/', 'ClientsController@index')->name('client.home');

        //MÓDULO DE PROYECTOS
        Route::group(['prefix' => 'projects'], function(){
            Route::get('/', 'ProjectsController@list')->name('client.projects.list');

        });

        //MÓDULO DE HOSTINGS
        Route::group(['prefix' => 'hostings'], function(){
            Route::get('/', 'HostingController@list')->name('client.hostings.list');
        });

        //MÓDULO DE FACTURAS
        Route::group(['prefix' => 'bills'], function(){
            Route::get('/', 'BillController@list')->name('client.bills.list');
            //FACTURA DETALLADA
            Route::get('/detail', 'BillController@detail')->name('client.bills.detail');
        });
    });

    //LISTADO DE RUTAS PARA EL EMPLEADO
    Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'profile'], 'profile' => ['3']], function(){
        Route::get('/', 'EmployeesController@index')->name('employee.home');
        Route::get('/profile', 'EmployeesController@profile')->name('employee.profile');


        //MÓDULO DE PROYECTOS
        Route::group(['prefix' => 'projects'], function(){
            Route::get('/', 'ProjectsController@list')->name('employee.projects.list');
            Route::get('/detail', 'ProjectsController@detail')->name('employee.projects.detail');

        });

        //MÓDULO DE FACTURAS
        Route::group(['prefix' => 'bills'], function(){
            Route::get('/', 'BillController@list')->name('employee.bills.list');
            Route::get('/details', 'BillController@details')->name('employee.bills.details');


        });

        //MÓDULO DE INTERÉS
        Route::group(['prefix' => 'interest'], function(){
            Route::get('financing', 'FinancingController@list')->name('employee.interest.financing'); 
            Route::get('holidays', 'HolidaysController@list')->name('employee.interest.holidays');
            Route::get('bonds', 'BondsController@list')->name('employee.interest.bonds');
        });
    });

});





