<?php

	Route::group(['namespace'  => 'MeterOwner'], function () {

		Route::post('meter_owner/get', 'MeterOwnerTableController')->name('meter_owner.get');
		
		Route::get('meter_owner/{id}/destroy_meter_owner', 'MeterOwnerController@destroyMeterOwner')->name('meter_owner.destroy_meter_owner');

		Route::resource('meter_owner', 'MeterOwnerController');
	});