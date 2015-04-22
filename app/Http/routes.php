<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Excluding a route from CSRF? Go to Http/Middleware/VerifyCsrfToken.php
|
|
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Workbench routes - for mucking about
Route::get('/workbench/env', ['uses' => 'WorkbenchController@test_env']);
Route::get('/workbench/queue', ['uses' => 'WorkbenchController@test_queue']);



// Site Routes
Route::get('/', ['uses' => 'Site\PagesController@index']);
Route::get('/about', ['uses' => 'Site\PagesController@about']);
Route::get('/contact', ['uses' => 'Site\PagesController@contact']);
Route::get('/register', ['uses' => 'Site\PagesController@register']);


// App Routes
Route::group([
	'middleware'    =>  'auth',
	'prefix'    =>  'app',
	'namespace' => 'App'
], function() {
	Route::get( '/home', ['uses' => 'HomeController@index'] );
	Route::resource( 'contacts', 'ContactsController' );
});

// Queue Routes
Route::group([
	//'middleware'    =>  'auth',
	'prefix'    =>  'queue',
	'namespace' => 'Queue'
], function() {
	Route::get( '/add', ['uses' => 'QueuesController@add'] );
//	Route::resource( 'contacts', 'ContactsController' );
});




// Incoming Routes - perhaps move these to a lumen service later
Route::group([
	'prefix'    =>  'incoming',
	'middleware' => 'Campaignly\Http\Middleware\IncomingMiddleware',
	'namespace' => 'Incoming',
], function() {

	/** Webhooks - accept incoming data from a webhook */
	Route::get('webhooks/contacts/store', ['uses' => 'ContactsController@verifyWebhook']);
	Route::post('webhooks/contacts/store', ['uses' => 'ContactsController@storeWebhook']);

	/** Webforms */
	Route::post('webforms/contacts/store', ['uses' => 'ContactsController@storeWebForm']);
});

