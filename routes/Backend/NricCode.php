<?php

	Route::group(['namespace'  => 'NricCode'], function () {

		Route::post('nric_codes/get', 'NricCodeTableController')->name('nric_codes.get');
		Route::resource('nric_codes', 'NricCodeController');
	});

