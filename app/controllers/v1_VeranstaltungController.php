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
		if ($id !== null) {
			
			return Response::json(array(
				'status' => 'error',
				'message' => 'Cannot POST/CREATE a new resource based on resource.'
				), 405);

		} else {

			// Create new record
			$ret = Veranstaltung::createNew('DATA GOES HERE');

			return Response::json(array(
				'status' => $ret->status,
				'message' => $ret->msg,
				'data' => $ret->data
				));

		}
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