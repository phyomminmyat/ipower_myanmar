<?php

	Route::group(['namespace'  => 'Region'], function () {

		Route::post('region/get', 'RegionTableController')->name('region.get');
		Route::get('region/{id}/destroy_region', 'RegionController@destroyRegion')->name('region.destroy_region');
		Route::resource('region', 'RegionController');
	});