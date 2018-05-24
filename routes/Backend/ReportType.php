<?php

	Route::group(['namespace'  => 'ReportType'], function () {

		Route::get('report_type/{id}/destroy_report_type', 'ReportTypeController@destroyReportType')->name('report_type.destroy_report_type');
		Route::resource('report_type', 'ReportTypeController');
	});