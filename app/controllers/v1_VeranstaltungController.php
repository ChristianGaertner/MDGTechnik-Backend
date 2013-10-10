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
							'data' => json_decode(Veranstaltung::all())
						));

		} else {

			$data = json_decode(Veranstaltung::find($id));

			if ($data === null) {
				$status = 'error';
				$message = 'Not found';
				$code = 404;
			} else {
				$status = 'success';
				$message = null;
				$code = 200;

				$data->workers = json_decode($data->workers);
			}



			return Response::json(array(
							'status' => $status,
							'message' => $message,
							'data' => $data
						), $code);

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
			// Validation
			$validator = Validator::make(
				Input::all(),
				array(
					// 'name' => 'required|unique:veranstaltungen',
					'author' => 'required',
					'email' => 'required|email',
					'loc' => 'required',
					'date' => 'required',
					'timespan' => 'required',
					)
				);

			if ($validator->fails()) {
				return Response::json(array(
						'status' => 'error',
						'message' => $validator->messages(),
						'data' => null
					), 400);
			}

			if (Input::has('req')) {
				$req = Input::get('req');
			} else {
				$req = '';
			}

			if (Input::has('notes')) {
				$notes = Input::get('notes');
			} else {
				$notes = '';
			}
					

			$veranstaltung = new Veranstaltung;
			$veranstaltung->status_message 		= 'waiting review';
			$veranstaltung->status_type 		= 'warning';
			$veranstaltung->name				= Input::get('name');
			$veranstaltung->author 				= Input::get('author');
			$veranstaltung->email				= Input::get('email');
			$veranstaltung->loc					= Input::get('loc');
			$veranstaltung->date				= Input::get('date');
			$veranstaltung->timespan			= Input::get('timespan');
			$veranstaltung->req					= $req;
			$veranstaltung->notes				= $notes;
			$veranstaltung->workers				= 'waiting review';

			$veranstaltung->save();

			return Response::json(array(
				'status' => 'success',
				'message' => null,
				'data' => array(
					'id' => $veranstaltung->id
					)
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