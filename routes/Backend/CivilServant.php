<?php

	Route::group(['namespace'  => 'CivilServant'], function () {

		Route::post('civil_servant/get', 'CivilServantTableController')->name('civil_servant.get');
		Route::resource('civil_servant', 'CivilServantController');
	});