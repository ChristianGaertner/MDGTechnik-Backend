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
			$validator = Veranstaltung::validate(Input::all());

			if ($validator->fails()) {
				return Response::json(array(
						'status' => 'error',
						'message' => 'Look at the data attribute for more details',
						'data' => json_decode($validator->messages())
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
			$veranstaltung->key					= Hash::make(
				Input::get('name') .
				Input::get('email') . 
				time() .
				Input::get('loc') .
				Request::getClientIp()
				);

			$veranstaltung->save();

			return Response::json(array(
				'status' => 'success',
				'message' => null,
				'data' => array(
					'id' => $veranstaltung->id,
					'key' => $veranstaltung->key
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
		$rp = RequestBody::get();
		
		if (empty($rp)) {
			return Response::json(array(
				'status' => 'success',
				'message' => 'Nothing updated!',
				'data' => null
				));
		}

		$veranstaltung = Veranstaltung::find($rp['id']);

		if (isset($rp['name']) && $veranstaltung->name !== $rp['name']) {
			return Response::json(array(
				'status' => 'error',
				'message' => 'The name cannot be changed!',
				'data' => null
				), 409);
		}

		if (array_key_exists('loc', $rp) && $v = Veranstaltung::validate($rp, 'loc')) {
			if (!$v->fails()) {
				$veranstaltung->loc = $rp['loc'];
			}
		}





	}

	/**
	 * Delete all resources.
	 *
	 * @return Response
	 */
	public function deleteIndex($id = null)
	{
		if ($id === null) {
			
			return Response::json(array(
					'status' => 'error',
					'message' => 'You do not have enough permissions for performing this task',
					'data' => null
				), 403);

		} else {

			if (!Input::has('key')) {
				return Response::json(array(
					'status' => 'error',
					'message' => 'Please provide the key for this event',
					'data' => null
				), 401);
			}

			$veranstaltung = Veranstaltung::find($id);

			if ($veranstaltung->key == base64_decode(Input::get('key'))) {
				
				$veranstaltung->delete();

				return Response::json(array(
					'status' => 'success',
					'message' => 'Event has been deleted',
					'data' => array(
						'id' => $id
						)
				));

			} else {
				return Response::json(array(
					'status' => 'error',
					'message' => 'Wrong key',
					'data' => null
				), 401);
			}

		}
	}
}