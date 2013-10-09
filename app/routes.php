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

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'v1'), function() {

	Route::post('veranstaltungen', function() {
		echo "veranstaltung";
	});

	Route::get('veranstaltungen', function() {
		echo "veranstaltung";
	});

	Route::put('veranstaltungen', function() {
		echo "veranstaltung";
	});

	Route::delete('veranstaltungen', function() {
		echo "veranstaltung";
	});



	Route::get('veranstaltungen/{id}', function($id) {
		echo "veranstaltung ", $id;
	})
	->where('id', '[0-9]+');

	Route::get('veranstaltungen/{id}', function($id) {
		echo "veranstaltung ", $id;
	})
	->where('id', '[0-9]+');

	Route::get('veranstaltungen/{id}', function($id) {
		echo "veranstaltung ", $id;
	})
	->where('id', '[0-9]+');

	Route::get('veranstaltungen/{id}', function($id) {
		echo "veranstaltung ", $id;
	})
	->where('id', '[0-9]+');

});