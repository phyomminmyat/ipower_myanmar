<?php

	Route::group(['namespace'  => 'Community'], function () {

		Route::post('communities/get', 'CommunityTableController')->name('communities.get');
		Route::resource('communities', 'CommunityController');
	});