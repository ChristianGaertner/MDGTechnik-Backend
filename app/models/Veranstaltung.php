<?php

class Veranstaltung extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'veranstaltungen';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('key');

	public static function getSingle($id) {
		return array(
				"id" => $id,
				"status" => array(
					"message" => "ok",
					"type" => "positive"
					),
				"createdAt" => "1 Januar 1971",
				"lastEdit" => "1 Januar 1971",
				"name" => "Konzert XYZ",
				"author" => "Christian Gärtner",
				"email" => "christiangaertner.film@googlemail.com",
				"loc" => "Aula",
				"date" => "1 Januar 1971",
				"timespan" => "00:00 - 24:00",
				"req" => "2x Mikrophon",
				"notes" => "Alles soll blau sein!!",
				"workers" => array(
					array(
						"name" => "Christian",
						"job" => "Licht"
						),
					array(
						"name" => "Philip",
						"job" => "Ton"
						),
					array(
						"name" => "Niloy",
						"job" => "Ton"
						),
				)
			);
	}
}