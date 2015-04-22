<?php  namespace Campaignly\Http\Controllers\Incoming;

use Campaignly\Http\Controllers\Controller;

class BaseController extends Controller {

	/**
	 * Checks the request for a valid api key (checks against the
	 * one set in .env)
	 * @param $request
	 *
	 * @return bool
	 */
	protected function verifyApiKey( $request )
	{
		$incomingKey = $request->get('incomingKey', FALSE);
		if ( !  $incomingKey OR $incomingKey !== env('INCOMING_API_KEY'))
			return false;
		return true;
	}

	
}