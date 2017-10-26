<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout' , 'Auth\LoginController@logout')->name('logout');
Route::resource('/clients','ClientsController');
Route::resource('/sponsors','SponsorsController');
Route::resource('/roles','RolesController');
Route::resource('/permissions','PermissionsController');
Route::resource('/admissions','AdmissionsController');
Route::resource('/employees','EmployeesController');
Route::resource('/users', 'UsersController');
Route::resource('/stations','StationsController');