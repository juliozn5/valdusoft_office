<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('bill', 'BillController@prueba');
Auth::routes();

// USUARIO LOGUEADO
Route::group(['middleware' => ['auth']], function () {


    Route::get('/', 'HomeController@index')->name('home');

    Route::get('profile', 'ProfileController@edit')->name('profile');
    Route::patch('profile-update', 'ProfileController@update')->name('profile.update');
    Route::post('profile-update', 'ProfileController@updatePhoto')->name('profile.updates');

    Route::get('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

    Route::post('change', 'ChangePasswordController@change')->name('change-password');

    //LISTADO DE RUTAS PARA EL ADMINISTRADOR
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'profile'], 'profile' => ['1']], function () {
        Route::get('/', 'AdminController@index')->name('admin.home');
        //VERIFICAR SI UN CORREO YA EXISTE EN LA BASE DE DATOS
        Route::get('check-email/{email?}', 'AdminController@check_email')->name('admin.check-email');

        //MÓDULO DE PROYECTOS
        Route::group(['prefix' => 'projects'], function () {
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
            Route::get('client-list/{client_id}', 'ProjectsController@client_list')->name('admin.projects.client-list');
        });

        //MÓDULO DE CLIENTES
        Route::group(['prefix' => 'clients'], function () {
            Route::get('/', 'ClientsController@list')->name('admin.clients.list');
            Route::get('show/{slug}/{id}', 'ClientsController@show')->name('admin.clients.show');
            Route::get('create', 'ClientsController@create')->name('admin.clients.create');
            Route::get('edit/{id}', 'ClientsController@edit')->name('admin.clients.edit');
            Route::post('store', 'ClientsController@store')->name('admin.clients.store');
            Route::patch('update/{id}', 'ClientsController@update')->name('admin.clients.update');
            Route::delete('delete/{id}', 'ClientsController@delete')->name('admin.clients.delete');

        });

        //MÓDULO DE EMPLEADOS
        Route::group(['prefix' => 'employees'], function () {
            Route::get('/', 'EmployeesController@list')->name('admin.employees.list');
            Route::get('create', 'EmployeesController@create')->name('admin.employees.create');
            Route::post('store', 'EmployeesController@store')->name('admin.employees.store');
            Route::patch('update/{employee}', 'EmployeesController@update')->name('admin.employees.update');
            Route::get('edit/{employee}', 'EmployeesController@edit')->name('admin.employees.edit');
            Route::get('show/{slug}/{id}', 'EmployeesController@show')->name('admin.employees.show');
            Route::post('assign-projects', 'EmployeesController@assign_projects')->name('admin.employees.assign-projects');
        });

        //MÓDULO DE HOSTINGS
        Route::group(['prefix' => 'hostings'], function () {
            Route::get('/', 'HostingController@list')->name('admin.hostings.list');
            Route::get('show/{id}', 'HostingController@show')->name('admin.hostings.show');
            Route::get('create', 'HostingController@create')->name('admin.hostings.create');
            Route::get('edit/{id}', 'HostingController@edit')->name('admin.hostings.edit');
            Route::post('store', 'HostingController@store')->name('admin.hostings.store');
            Route::post('update', 'HostingController@update')->name('admin.hostings.update');
            Route::post('renewal', 'HostingController@renewal')->name('admin.hostings.renewal');
            Route::delete('delete/{id}', 'HostingController@delete')->name('admin.hostings.delete');
        });

        //MÓDULO FINANCIERO
        Route::group(['prefix' => 'financial'], function () {
            //MÓDULO FINANCIERO - FACTURAS
            Route::group(['prefix' => 'bills'], function () {
                Route::get('/', 'BillController@list')->name('admin.bills.list');
                Route::post('store', 'BillController@store')->name('admin.bills.store');
                Route::get('show/{id}', 'BillController@show')->name('admin.bills.show');
                Route::get('download/{id}', 'BillController@download')->name('admin.bills.download');
                Route::get('downloadPDF/{id}', 'BillController@downloadPDF')->name('admin.bills.downloadPDF');
                Route::post('send', 'BillController@send')->name('admin.bills.send');
                Route::get('/pending', 'BillController@pending')->name('admin.bills.pending');
            });


            //MÓDULO FINANCIERO - NÓMINA
            Route::group(['prefix' => 'payroll'], function () {
                Route::get('/', 'PayrollController@list')->name('admin.payrolls.list');
                Route::get('create', 'PayrollController@create')->name('admin.payrolls.create');
                Route::post('store', 'PayrollController@store')->name('admin.payrolls.store');
                Route::get('show/{id}', 'PayrollController@show')->name('admin.payrolls.show');
                Route::get('edit/{id}', 'PayrollController@edit')->name('admin.payrolls.edit');
                Route::post('update', 'PayrollController@update')->name('admin.payrolls.update');
                Route::get('store-bills/{payroll_id}', 'BillController@store_payrolls_bills')->name('admin.payrolls.store-bills');
                Route::get('export/{id}', 'PayrollController@export')->name('admin.payrolls.export');
            });

            //MÓDULO FINANCIERO - PAGOS
            Route::group(['prefix' => 'payments'], function () {
                Route::get('/', 'PaymentsController@list')->name('admin.payments.list');
                Route::post('store', 'PaymentsController@store')->name('admin.payments.store');
            });
        });

        Route::get('dataGrafica', 'AdminController@dataGrafica')->name('dataGrafica');
        Route::post('', 'BillController@saveInvoice')->name('save-invoice');
    });

    //LISTADO DE RUTAS PARA EL CLIENTE
    Route::group(['prefix' => 'client', 'middleware' => ['auth', 'profile'], 'profile' => ['2']], function () {
        Route::get('/', 'ClientsController@index')->name('client.home');


        //MÓDULO DE PROYECTOS
        Route::group(['prefix' => 'projects'], function () {
            Route::get('/', 'ProjectsController@list')->name('client.projects.list');
            Route::get('show/{slug}/{id}', 'ProjectsController@show')->name('client.projects.show')->middleware('project_user');
            Route::get('/detail', 'ProjectsController@detailclient')->name('client.projects.detail');
            Route::post('add-attachment', 'ProjectsController@attachments')->name('client.project.add-attachments');
            Route::post('update-attachment', 'ProjectsController@updates')->name('client.projects.update-attachments');

        });

        //MÓDULO DE HOSTINGS
        Route::group(['prefix' => 'hostings'], function () {
            Route::get('/', 'HostingController@list')->name('client.hostings.list');
            Route::get('/{id}', 'HostingController@showHosting')->name('client.hosting.showHosting');
            Route::post('', 'BillController@saveInvoice')->name('save-invoices');
        });

         //MÓDULO FINANCIERO - PAGOS
        Route::group(['prefix' => 'payments'], function () {
               
            Route::post('store', 'PaymentsController@store')->name('client.payments.store');
        });

        //MÓDULO DE FACTURAS
        Route::group(['prefix' => 'bills'], function () {
            Route::get('/', 'BillController@list')->name('client.bills.list');
            Route::get('show/{id}', 'BillController@show')->name('client.bills.show');
            Route::get('download/{id}', 'BillController@download')->name('client.bills.download');
            Route::get('downloadPDF/{id}', 'BillController@downloadPDF')->name('client.bills.downloadPDF');
        });
    });

    //LISTADO DE RUTAS PARA EL EMPLEADO
    Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'profile'], 'profile' => ['3']], function () {
        Route::get('/', 'EmployeesController@index')->name('employee.home');
        Route::get('/profile', 'EmployeesController@profile')->name('employee.profile');
        Route::post('profile', 'EmployeesController@editPhone')->name('employee.profiles');
        Route::post('update-skills', 'EmployeesController@update_skills')->name('employee.profile.update-skills');
        Route::post('update-wallet', 'EmployeesController@update_wallet')->name('employee.profile.update-wallet');
        Route::post('upload-curriculum', 'EmployeesController@upload_curriculum')->name('employee.profile.upload-curriculum');

        //MÓDULO DE PROYECTOS
        Route::group(['prefix' => 'projects'], function () {
            Route::get('/', 'ProjectsController@list')->name('employee.projects.list');
            Route::get('show/{slug}/{id}', 'ProjectsController@show')->name('employee.projects.show')->middleware('project_user');
        });

        //MÓDULO DE FACTURAS
        Route::group(['prefix' => 'bills'], function () {
            Route::get('/', 'BillController@list')->name('employee.bills.list');
            Route::get('/show/{id}', 'BillController@show')->name('employee.bills.show');
            Route::get('download/{id}', 'BillController@download')->name('employee.bills.download');
        });

        //MÓDULO DE INTERÉS
        Route::group(['prefix' => 'interest'], function () {
            Route::get('financing', 'FinancingController@list')->name('employee.interest.financing');
            Route::get('holidays', 'HolidaysController@list')->name('employee.interest.holidays');
            Route::get('bonds', 'BondController@list')->name('employee.interest.bonds');
        });
    });
});
