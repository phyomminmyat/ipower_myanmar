<?php

	Route::group(['namespace'  => 'Township'], function () {

		Route::post('township/get', 'TownshipTableController')->name('township.get');
		Route::resource('township', 'TownshipController');
	});