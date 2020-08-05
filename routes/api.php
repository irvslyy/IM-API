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

Route::post('/login/user/', 'UserController@login');
Route::post('/register/user','UserController@register');

Route::middleware('auth:api','throttle:75,1')->group(function () { 

        // API LOGIN DENGAN HIRARKY && API USER GET GRF DAN REQUEST
        Route::get('/heirarky/{id}', 'HeirarkyController@ApiHeirarky');
        Route::get('/grf/user/list/{id}','GoodreqController@UserStatusGrf');

        //API STOCK
        Route::get('/stock/mobile/', 'StockController@apiStockMobile');
        Route::get('/stock', 'StockController@StockApi');

        //API FORM REQUESTS 
        Route::post('/form/req', 'ReqController@store');

        //API UPDATE STATUS APPROVAL ADMIN PADA TABLE REQUESTS DAN GRF
        Route::post('/request/status/admin/{code}','ReqController@apiUpdateADMINSTATUS');
        Route::post('/goodrequest/update/status','GoodreqController@Update_status');

        // Api update status approval TL,SPV,MNG,ADMIN
        Route::post('/request/status/tl/{code}','ReqController@apiUpdateTLSTATUS');
        Route::post('/request/status/spv/{code}','ReqController@apiUpdateSPVSTATUS');
        Route::post('/request/status/mng/{code}','ReqController@apiUpdateMNGSTATUS');
        Route::get('/request/approval/list','ReqController@mngStatusReq');

        //API GOOD REQUESTS FORM
        Route::get('/goodreq/employee/{emp}','GoodreqController@GRF');
        Route::get('/goodrequest','GoodreqController@getGRF');
        Route::post('/goodReq/', 'GoodreqController@store');
        Route::post('/goodReq/update/{id}','GoodreqController@grfUpdate');
        Route::post('/goodreq/update/proses/{grf_number}','GoodreqController@UpdatingProsesStatus');

        // Api update status approval TL,SPV,MNG,ADMIN
        Route::post('/grf/status/tl/{id}','GoodreqController@apiGrfUpdateSPVSTATUS');
        Route::post('/grf/status/spv/{id}','GoodreqController@apiGrfUpdateSPVSTATUS');
        Route::post('/grf/status/mng/{id}','GoodreqController@apiGrfUpdateMNGSTATUS');
        Route::get('/grf/approval/list/{wh_code}','GoodreqController@MngStatusGrf');
        Route::get('/grf/approval/list','GoodreqController@MngStatusAll');

        //API Ondelivery
        Route::post('/ondelivery', 'OndeliveryController@store');

        //API SEGMENT
        Route::get('/segment/', 'SegmentController@index');

        //API SEGMENT
        Route::get('/wh/{regional}', 'WarehouseController@ApiWarehouse');

        //APPROVE TL,SPV,MNG
        Route::get('/approve/tl/{id}', 'ReqController@apiGetReqTL');
        Route::get('/approve/spv/{id}', 'ReqController@apiGetReqSPV');
        Route::get('/approve/mng/{id}', 'ReqController@apiGetReqMNG');

        //API USAGE BALANCE
        Route::get('/usagebalance/{product}','ReqController@masterItems'); // INLINE CLOSURE
        Route::get('/usagebalance/otb/{product}','ReqController@masterItemsOtb'); // INLINE CLOSURE

}); 