<?php

	Route::group(['namespace'  => 'MeterOwner'], function () {

		Route::post('meter_owner/get', 'MeterOwnerTableController')->name('meter_owner.get');
		Route::resource('meter_owner', 'MeterOwnerController');
	});