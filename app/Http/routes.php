<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
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

// Incoming Routes
Route::group([
	'prefix'    =>  'incoming',
	'namespace' => 'Incoming'
], function() {

	/** Contacts */
	Route::get('contacts/store', ['uses' => 'ContactsController@verifyWebhook']);
	Route::post('contacts/store', ['uses' => 'ContactsController@store']);
});