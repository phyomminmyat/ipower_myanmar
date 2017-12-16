<?php

	Route::group(['namespace'  => 'Township'], function () {

		Route::post('township/get', 'TownshipTableController')->name('township.get');
		Route::get('township/{id}/destroy_township', 'TownshipController@destroyTownship')->name('township.destroy_township');
		Route::resource('township', 'TownshipController');
	});