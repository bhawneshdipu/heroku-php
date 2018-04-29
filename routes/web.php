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

/*
 * Guest urls
 *
 */

Route::get('/sellerdeal', 'SellerDealController@create');
Route::post('/sellerdeal', 'SellerDealController@store');
Route::get('/visitoroffer', 'VisitorOfferController@create');
Route::post('/visitoroffer', 'VisitorOfferController@store');
Route::get('/selltoany', 'SellToAnyController@create');
Route::post('/selltoany', 'SellToAnyController@store');
Route::get('/buyfromany', 'BuyFromAnyController@create');
Route::post('/buyfromany', 'BuyFromAnyController@store');

Route::get('/home', 'HomeController@index')->name('home');
