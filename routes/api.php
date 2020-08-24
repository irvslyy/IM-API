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

Route::post('/login/user/', 'AuthController@login');
Route::post('/register/user','AuthController@register');

Route::middleware('auth:api')->group(function () { 
    
        // API LOGIN DENGAN HIRARKY && API USER GET GRF DAN REQUEST
        Route::get('/heirarky/{id}', 'HeirarkyController@ApiHeirarky');
        Route::get('/grf/user/list/{id}','GoodreqController@UserStatusGrf');

        //API STOCK
        Route::get('/stock', 'StockController@StockApi');
        Route::get('/stock/mobile/', 'StockController@apiStockMobile');

        //API FORM REQUESTS 
        Route::post('/form/req', 'ReqController@store');

        //API UPDATE STATUS APPROVAL ADMIN PADA TABLE REQUESTS DAN GRF
        Route::post('/goodrequest/update/status','GoodreqController@Update_status');

        // Api update status approval SPV,MNG,ADMIN
        Route::post('/request/status/spv/{code}','ReqController@apiUpdateSPVSTATUS');
        Route::post('/request/status/mng/{code}','ReqController@apiUpdateMNGSTATUS');
        Route::get('/request/approval/list','ReqController@mngStatusReq');

        //API GOOD REQUESTS FORM
        Route::get('/goodreq/employee/{emp}','GoodreqController@GRF');
        Route::get('/goodrequest','GoodreqController@getGRF');
        Route::post('/goodReq/', 'GoodreqController@store');
        Route::post('/goodReq/update/{id}','GoodreqController@grfUpdate');

        // Api update status approval TL,SPV,MNG,ADMIN
        Route::post('/grf/status/spv/{id}','GoodreqController@apiGrfUpdateSPVSTATUS');
        Route::post('/grf/status/mng/{id}','GoodreqController@apiGrfUpdateMNGSTATUS');
        Route::get('/grf/approval/list/{wh_code}','GoodreqController@MngStatusGrf');
        Route::get('/grf/approval/list','GoodreqController@MngStatusAll');
        Route::get('/grf/approval/list/disaster','GoodreqController@MngStatusAllDisaster');
        Route::post('/goodreq/update/proses/{grf_number}','GoodreqController@UpdatingProsesStatus');
        Route::get('/grf/approval/listing/{request_code}','GoodreqController@MngStatusAllByGnumber');
        Route::post('/request/status/admin/{code}','GoodreqController@apiUpdateADMINSTATUS');

        //API Ondelivery
        Route::post('/ondelivery', 'OndeliveryController@store');

        //API SEGMENT
        Route::get('/segment/', 'SegmentController@index');

        //API SEGMENT
        Route::get('/wh/{regional}', 'WarehouseController@ApiWarehouse');

        //API SHIPPING  
        Route::get('/shipping/{shipping_number}','ShippingController@shippingGetNumber');

        //APPROVE TL,SPV,MNG
        Route::get('/approve/spv/{id}', 'ReqController@apiGetReqSPV');
        Route::get('/approve/mng/{id}', 'ReqController@apiGetReqMNG');

        //API HISTORY APPROVAL
        Route::get('/history/approval','HistoryController@History');
        Route::post('/history/approval/post','HistoryController@History_store');
        Route::get('/history/approval/{request_code}','HistoryController@History_users');

        //API MANAGER GET ALL TL
        Route::get('/manager/{id}','UserController@getStaffFromManager');

        //API USAGE BALANCE
        Route::get('/usage/{id}','MasteritemsController@usage');
        Route::get('/usagewarehouse/{segment}','MasteritemsController@usagePerWarehouse');
        Route::get('/testing/{segment}','MasteritemsController@Percentage');
        Route::get('/userdisaster','GoodreqController@userDisaster');
        
        //API TOKEN USERS
        Route::get('/update/token/{id}','UserController@updateToken');
        Route::get('/post/token','UserController@PostToken'); 
        Route::get('/get/supervisor/token/{id}','UserController@SupervisorToken');
        Route::get('/get/manager/token/{id}','UserController@ManagerToken');        
});

