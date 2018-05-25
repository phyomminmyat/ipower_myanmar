<?php

	Route::group(['namespace'  => 'Notification'], function () {

		Route::get('notification/{id}/destroy_notification', 'NotificationController@destroynotification')->name('notification.destroy_notification');

		Route::resource('notification', 'NotificationController');
	});