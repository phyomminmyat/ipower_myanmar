<?php

	Route::group(['namespace'  => 'UnitRate'], function () {

		// Route::post('unit_rate/get', 'UnitRateTableController')->name('unit_rate.get');
		Route::get('unit_rate/{id}/destroy_unit_rate', 'UnitRateController@destroyUnitRate')->name('unit_rate.destroy_unit_rate');
		Route::resource('unit_rate', 'UnitRateController');
	});