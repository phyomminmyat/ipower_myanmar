<?php

	Route::group(['namespace'  => 'NricTownship'], function () {

		Route::post('nric_township/get', 'NricTownshipTableController')->name('nric_township.get');
		Route::resource('nric_township', 'NricTownshipController');
	});