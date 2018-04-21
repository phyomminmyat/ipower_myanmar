<?php

	Route::group(['namespace'  => 'Lamp'], function () {

		Route::get('lamp/{id}/destroy_lamp', 'LampController@destroyLamp')->name('lamp.destroy_lamp');

		Route::resource('lamp', 'LampController');
	});