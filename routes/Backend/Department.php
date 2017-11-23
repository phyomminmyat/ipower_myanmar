<?php

	Route::group(['namespace'  => 'Department'], function () {

		Route::get('department/district_data/{region}', 'DepartmentController@getDistrictData')->name('department.district_data');
		Route::get('department/township_data/{district}', 'DepartmentController@getTownshipData')->name('department.township_data');
		Route::get('department/village_data/{township}', 'DepartmentController@getVillageData')->name('department.village_data');
		Route::get('department/community_data/{village}', 'DepartmentController@getCommunityData')->name('department.community_data');
		Route::post('department/get', 'DepartmentTableController')->name('department.get');
		Route::resource('department', 'DepartmentController');
	});