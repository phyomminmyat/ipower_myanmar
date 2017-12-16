<?php

	Route::group(['namespace'  => 'CivilServant'], function () {

		Route::post('civil_servant/get', 'CivilServantTableController')->name('civil_servant.get');

		Route::get('civil_servant/{id}/destroy_civil_servant', 'CivilServantController@destroyCivilServant')->name('civil_servant.destroy_civil_servant');

		Route::resource('civil_servant', 'CivilServantController');
	});