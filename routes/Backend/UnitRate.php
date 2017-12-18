<?php

	Route::group(['namespace'  => 'UnitRate'], function () {

		// Route::post('unit_rate/get', 'UnitRateTableController')->name('unit_rate.get');
		Route::get('unit_rate/{id}/destroy_nric_code', 'UnitRateController@destroyUnitRate')->name('unit_rate.destroy_nric_code');
		Route::resource('unit_rate', 'UnitRateController');
	});