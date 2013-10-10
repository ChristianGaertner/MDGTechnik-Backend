<?php

class Veranstaltung extends Eloquent {

	public static function getAll() {
		return array( 
			array(
				"name" => "Konzert 1",
				"id" => 1
				),
			array(
				"name" => "Konzert 2",
				"id" => 2
				),
			array(
				"name" => "Konzert 3",
				"id" => 4
				),
			array(
				"name" => "Konzert 5",
				"id" => 5
				),
			array(
				"name" => "Konzert 6",
				"id" => 6
				)
			);
	}

	public static function createNew($data) {
		$ret = new stdClass;
		$ret->status = 'success';
		$ret->msg = null;
		$ret->data = array(
			'id' => 1
			);
		return $ret;
	}

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