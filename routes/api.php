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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API LOGIN DENGAN HIRARKY
Route::post('/login/user/', 'UserController@login');
Route::get('/heirarky/{id}', 'HeirarkyController@ApiHeirarky');

//API STOCK
Route::get('/stock/mobile/', 'StockController@apiStockMobile');
Route::get('/stock', 'StockController@StockApi');

//API FORM REQUESTS
Route::post('/form/req', 'ReqController@store');

//API GOOD REQUESTS FORM
Route::get('/goodreq/employee/{emp}','GoodreqController@GRF');
Route::post('/goodReq/', 'GoodreqController@store');

//API Ondelivery
Route::post('/ondelivery', 'OndeliveryController@store');

//API SEGMENT
Route::get('/segment/', 'SegmentController@index');


//API SEGMENT
Route::get('/wh/{regional}', 'WarehouseController@ApiWarehouse');


Route::get('/approve/tl/{id}', 'ReqController@apiGetReqTl');
Route::get('/approve/spv/{id}', 'ReqController@apiGetReqSPV');
Route::get('/approve/mng/{id}', 'ReqController@apiGetReqMNG');
