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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'v1' , 'namespace' => 'Api'], function()
{
    Route::post('authenticate', 'ApiController@authenticate');
    Route::get('authenticate', 'ApiController@index');
    Route::get('tokenrefresh', 'ApiController@tokenrefresh');
    Route::get('locations', 'ApiController@locations');
    Route::get('meter_list', 'ApiController@getMeterList');

    Route::post('save_meter', 'ApiController@saveMeter');
    Route::get('edit_meter/{id}', 'ApiController@editMeter');
    Route::post('update_meter/{id}', 'ApiController@updateMeter');

    Route::get('street_list', 'ApiController@getStreetList');
    Route::get('owner_list', 'ApiController@getOwnerList');
    Route::get('region_list', 'ApiController@locations');
    Route::get('township_list', 'ApiController@getTownshipList');
    Route::get('district_list', 'ApiController@getDistrictList');
    Route::get('village_list', 'ApiController@getVillageList');
    Route::get('community_list', 'ApiController@getCommunityList');


    Route::post('save_lamp_post', 'ApiController@saveLampPost');
    Route::get('edit_lamp_post/{id}', 'ApiController@editLampPost');
    Route::post('update_lamp_post/{id}', 'ApiController@updateLampPost');

    Route::get('civil_servent_profile', 'ApiController@get_civil_servent_profile');
    Route::get('meter_owner_profile', 'ApiController@get_meter_owner_profile');
    Route::post('save_imei','ApiController@saveImei');

    Route::get('notification','ApiController@getNotificationList');

    Route::get('report_type_list','ApiController@getReportTypeList');

    Route::post('save_report', 'ApiController@saveReport');

});