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

Route::view('/', 'pages.index')->name('index');
Route::view('/about-us', 'pages.about-us')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/services', 'pages.services')->name('service');
Route::view('/demo', 'pages.demo');

Route::post('track/shipment', "ShipmentController@trackShipment")->name('trackShipment');



include 'admin.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('dashboard', "Admin\AdminController@dashboard")->name('dashboard');

});
