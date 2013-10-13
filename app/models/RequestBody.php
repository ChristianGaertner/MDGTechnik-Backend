<?php

class RequestBody {

	/**
	 * Returns the RequestBody (php://input)
	 * @return array The parsed request body
	 */
	public static function get()
	{
		$rp = array();
		parse_str(file_get_contents('php://input'), $rp);
		return $rp;
	}

}