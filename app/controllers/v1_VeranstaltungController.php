<?php

class v1_VeranstaltungController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex($id = null)
	{
		if ($id === null) {
			
			return Response::json(array(
							'status' => 'success',
							'message' => null,
							'data' => Veranstaltung::getAll()
						));

		} else {

			return Response::json(array(
							'status' => 'success',
							'message' => null,
							'data' => Veranstaltung::getSingle($id)
						));

		}
		
	}

	/**
	 * Create a new resource.
	 *
	 * @return Response
	 */
	public function postIndex($id = null)
	{
		throw new Exception("Error Processing Request", 1);
	}

	/**
	 * Bulk update resources.
	 *
	 * @return Response
	 */
	public function putIndex($id = null)
	{
		echo "putIndex";
	}

	/**
	 * Delete all resources.
	 *
	 * @return Response
	 */
	public function deleteIndex($id = null)
	{
		echo "deleteIndex";
	}
}