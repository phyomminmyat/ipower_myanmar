<?php

	Route::group(['namespace'  => 'District'], function () {

		Route::post('district/get', 'DistrictTableController')->name('district.get');
		Route::get('district/{id}/destroy_district', 'DistrictController@destroyDistrict')->name('district.destroy_district');
		Route::resource('district', 'DistrictController');
	});