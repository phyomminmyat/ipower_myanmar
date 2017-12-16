<?php

	Route::group(['namespace'  => 'VillageTract'], function () {

		Route::post('village_tract/get', 'VillageTractTableController')->name('village_tract.get');
		Route::get('village_tract/{id}/destroy_village', 'VillageTractController@destroyVillage')->name('village_tract.destroy_village');
		Route::resource('village_tract', 'VillageTractController');
	});