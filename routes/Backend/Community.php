<?php

	Route::group(['namespace'  => 'Community'], function () {

		Route::post('communities/get', 'CommunityTableController')->name('communities.get');

		Route::get('communities/{id}/destroy_communities', 'CommunityController@destroyCommunity')->name('communities.destroy_communities');

		Route::resource('communities', 'CommunityController');
	});