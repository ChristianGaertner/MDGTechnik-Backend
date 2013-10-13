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

	protected static $validationRules = array(
					'name' => 'required|unique:veranstaltungen|min:3',
					'author' => 'required|min:5',
					'email' => 'required|email',
					'loc' => 'required|min:3',
					'date' => 'required|min:4',
					'timespan' => 'required|min:2',
				);


	/**
	 * Just a holder for the validation rules
	 * @param  array  $input The input array (most of the times Input::all())
	 * @return Validator        The validator object
	 */
	public static function validate(array $input, $type = null) {
		if ($type === null) {
			return Validator::make(
				$input,
				self::$validationRules
			);
		}

		return Validator::make(
			$input,
			(array) self::$validationRules[$type]
			);

	}
}