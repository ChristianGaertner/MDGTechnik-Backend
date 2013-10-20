<?php

class StatusMonitor extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$apiKey = require_once '../private/uptimerobot.api-key.php';

		$ur = new UpTimeRobotAPI($apiKey);

		$monitor = $ur->getMonitor();
		$uptime = $monitor->alltimeuptimeratio;
		$status = $monitor->status;

		if (Request::get('format') == 'json') {
			return Response::json(array(
				'status' => 'success',
				'message' => null,
				'data' => array(
					'status' => $status,
					'uptime' => $uptime
					)
				));
		}

		return View::make('status')
				->with('uptime', $uptime)
				->with('status', $status);

	}
}