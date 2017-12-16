<?php

	Route::group(['namespace'  => 'NricTownship'], function () {

		Route::post('nric_township/get', 'NricTownshipTableController')->name('nric_township.get');
		Route::get('nric_township/{id}/destroy_nric_township', 'NricTownshipController@destroyNricTowship')->name('nric_township.destroy_nric_township');
		Route::resource('nric_township', 'NricTownshipController');
	});