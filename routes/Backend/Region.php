<?php

	Route::group(['namespace'  => 'Region'], function () {

		Route::post('region/get', 'RegionTableController')->name('region.get');
		Route::resource('region', 'RegionController');
	});