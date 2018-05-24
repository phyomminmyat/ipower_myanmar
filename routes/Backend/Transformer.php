<?php

	Route::group(['namespace'  => 'Transformer'], function () {

		Route::get('transformer/{id}/destroy_transformer', 'TransformerController@destroyTransformer')->name('transformer.destroy_transformer');

		Route::resource('transformer', 'TransformerController');
	});