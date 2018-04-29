<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/user', function (Request $request) {


});
Route::get('/user', function (Request $request) {
    return $request->toArray();

});

/*
 * Get the top 5 rows for the Admin page with an ajax call.
 */
Route::post('/selltoany', function (Request $request) {
    $sellToAny=\App\SellToAny::orderBy('created_at','desc')->limit(5)->get();
    return response()->json(json_encode($sellToAny));
});

/*
 * Get the top 5 rows for the Admin page.
 */
Route::post('/buyfromany', function (Request $request) {
    $json=\App\BuyFromAny::orderBy('created_at','desc')->limit(5)->get();
    return response()->json(json_encode($json));
});

/*
 * Get the top 5 rows for the Admin page.
 */
Route::post('/sellerdeal', function (Request $request) {
    $json=\App\SellerDeal::orderBy('created_at','desc')->limit(5)->get();
    return response()->json(json_encode($json));
});

/*
 * Get the top 5 rows for the Admin page.
 */
Route::post('/visitoroffer', function (Request $request) {
    $json=\App\VisitorOffer::orderBy('created_at','desc')->limit(5)->get();
    return response()->json(json_encode($json));
});



