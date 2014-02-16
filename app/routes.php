<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * A simple status display page
 */
Route::any('status', function() {
	return Redirect::to('http://mdgtechnik-status.herokuapp.com');
});

/**
 * Just a catch to provide a response at any time
 */
Route::any('/{v1?}', function()
{
	return Response::json(array(
		'status' => 'error',
		'message' => 'No root level access possible',
		'data' => null
		), 405);
});



Route::group(array('prefix' => 'v1'), function() {

	Route::options('{resource?}/{id?}', function() {
	});

	Route::controller('veranstaltung/{id?}', 'v1_VeranstaltungController');
	
	// 404 Handling
	Route::any('{resource}/{id?}', function() {
		return Response::json(array(
			'status' => 'Error',
			'message' => 'Resource not found',
			'data' => null,
			), 404);
	});

});