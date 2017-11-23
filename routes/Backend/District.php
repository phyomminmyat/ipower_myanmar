<?php

	Route::group(['namespace'  => 'District'], function () {

		Route::post('district/get', 'DistrictTableController')->name('district.get');
		Route::resource('district', 'DistrictController');
	});