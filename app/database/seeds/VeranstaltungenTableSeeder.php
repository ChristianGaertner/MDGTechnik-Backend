<?php
class VeranstaltungenTableSeeder extends Seeder {

    public function run()
    {
        DB::table('veranstaltungen')->delete();

        Veranstaltung::create(array(
				"status_message" => "ok",
				"status_type" => "positive",
				"name" => "Konzert XYZ",
				"author" => "Christian Gärtner",
				"email" => "christiangaertner.film@googlemail.com",
				"loc" => "Halle 1",
				"date" => "1 Januar 1971",
				"timespan" => "00:00 - 24:00",
				"req" => "2x Mikrophon",
				"notes" => "Alles soll blau sein!!",
				"workers" => json_encode(array(
					'Licht' => array('Christian'),
					'Ton' => array('Philip', 'Niloy'),
					'Extra' => array(),
					)),
				"key" => Hash::make('Konzert XYZ' . 'christiangaertner.film@googlemail.com' . time())
				));

        Veranstaltung::create(array(
				"status_message" => "Zeitlich wird das knapp",
				"status_type" => "warning",
				"name" => "Konzert ZYZ",
				"author" => "Christian Gärtner",
				"email" => "christiangaertner.film@googlemail.com",
				"loc" => "Halle 2",
				"date" => "1 Januar 1971",
				"timespan" => "00:00 - 24:00",
				"req" => "2x Mikrophon",
				"notes" => "Alles soll blau sein!!",
				"workers" => json_encode(array(
					'Licht' => array('Christian'),
					'Ton' => array('Philip'),
					'Extra' => array('Niloy'),
					)),
				"key" => Hash::make('Konzert ZYZ' . 'christiangaertner.film@googlemail.com' . time())
				));
    }
}