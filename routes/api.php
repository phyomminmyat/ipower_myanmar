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
    Route::get('locations', 'ApiController@locations');
    Route::post('save_meter', 'ApiController@saveMeter');
    Route::get('edit_meter/{id}', 'ApiController@editMeter');
    Route::post('update_meter/{id}', 'ApiController@updateMeter');

    Route::post('save_lamp_post', 'ApiController@saveLampPost');
    Route::get('edit_lamp_post/{id}', 'ApiController@editLampPost');
    Route::post('update_lamp_post/{id}', 'ApiController@updateLampPost');


});