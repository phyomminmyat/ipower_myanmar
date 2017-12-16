<?php

	Route::group(['namespace'  => 'NricCode'], function () {

		Route::post('nric_codes/get', 'NricCodeTableController')->name('nric_codes.get');
		Route::get('nric_codes/{id}/destroy_nric_code', 'NricCodeController@destroyNricCode')->name('nric_codes.destroy_nric_code');
		Route::resource('nric_codes', 'NricCodeController');
	});

