<?php

	Route::group(['namespace'  => 'VillageTract'], function () {

		Route::post('village_tract/get', 'VillageTractTableController')->name('village_tract.get');
		Route::resource('village_tract', 'VillageTractController');
	});