<?php

	Route::group(['namespace'  => 'MonthlyMeterUnit'], function () {

		// Route::post('meter_units/get', 'MonthlyMeterUnitTableController')->name('meter_units.get');
		Route::get('meter_units/{id}/destroy_meter_unit', 'MonthlyMeterUnitController@destroyMeterUnit')->name('meter_units.destroy_meter_unit');
		Route::resource('meter_units', 'MonthlyMeterUnitController');
	});