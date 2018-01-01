<?php

	Route::group(['namespace'  => 'Street'], function () {

		// Route::post('street/get', 'StreetTableController')->name('street.get');

		Route::get('street/{id}/destroy_street', 'StreetController@destroyStreet')->name('street.destroy_street');

		Route::resource('street', 'StreetController');
	});