<?php

// Home page
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@submitForm');

// Projects page
Route::resource('projects', 'ProjectController', ['only' => ['index', 'show']]);

// Articles pages
Route::resource('articles', 'ArticleController', ['only' => ['index', 'show']]);

// Offer page
Route::resource('offer', 'OfferController', ['only' => ['index', 'show']]);

// Contact page


// Admin area
Route::get('admin', function() {
	return redirect('admin/articles');
});

Route::group([
	'namespace' => 'Admin',
	'middleware' => ['web', 'auth'],
	], function() {
		Route::resource('admin/projects', 'ProjectAdminController');
		Route::resource('admin/articles', 'ArticleAdminController');
		Route::resource('admin/offer', 'OfferAdminController');
		Route::resource('admin/upload', 'UploadController', ['only' => ['index', 'store', 'destroy']]);
});

// Login & Logout
Route::group(['middleware' => 'web'], function() {
	Route::get('admin/login', 'Auth\AuthController@showLoginForm');
	Route::post('admin/login', 'Auth\AuthController@login');
	Route::get('admin/logout', 'Auth\AuthController@logout');

	Route::get('contact', 'ContactController@index');
	Route::post('contact', 'ContactController@send');
});