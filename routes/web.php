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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/frontend/invoice/{id}', 'FrontendController@invoice')->name('frontend.invoice');
Route::resource('/frontend', 'FrontendController');

Auth::routes();
Route::resource('/admin/customer', 'CustomerController');
Route::resource('/ticket', 'TicketController');
Route::get('/admin/customer/checkin/{id}', 'CustomerController@checkin')->name('customer.checkin');


Route::get('/home', 'HomeController@index')->name('home');
