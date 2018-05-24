<?php

	Route::group(['namespace'  => 'Report'], function () {

		// Route::post('report/get', 'ReportTableController')->name('street.get');

		Route::get('report/{id}/destroy_report', 'ReportController@destroyReport')->name('report.destroy_report');

		Route::resource('report', 'ReportController');
	});