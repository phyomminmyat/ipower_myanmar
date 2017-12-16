<?php

	Route::group(['namespace'  => 'Meter'], function () {

		Route::get('meter/district_data/{region}', 'MeterController@getDistrictData')->name('meter.district_data');
		Route::get('meter/township_data/{district}', 'MeterController@getTownshipData')->name('meter.township_data');
		Route::get('meter/village_data/{township}', 'MeterController@getVillageData')->name('meter.village_data');
		Route::get('meter/community_data/{village}', 'MeterController@getCommunityData')->name('meter.community_data');
		Route::get('meter/{deletedMeter}/delete', 'MeterController@delete')->name('meter.delete-permanently');
        Route::get('meter/{deletedMeter}/restore', 'MeterController@restore')->name('meter.restore');
		Route::get('meter/deleted', 'MeterController@getDeleted')->name('meter.deleted');
		Route::post('meter/get', 'MeterTableController')->name('meter.get');
		Route::get('meter/{id}/destroy_meter', 'MeterController@destroyMeter')->name('meter.destroy_meter');

		Route::resource('meter', 'MeterController');
	});