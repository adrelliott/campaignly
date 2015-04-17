<?php  namespace campaignly\Http\Controllers\Incoming;

use campaignly\Http\Requests\Incoming\StoreContactRequest;
use campaignly\Traits\ApiResponses;

class ContactsController  extends BaseController {

	use ApiResponses;

	/** Some webhooks (namely MailChimp) need to run a one-time validation.
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function verifyWebhook()
	{
		return $this->respondOk( 'This URL is for validation only - no data is processed' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreContactRequest $request
	 *
	 * @return Response
	 */
	public function store( StoreContactRequest $request )
	{
		// Check for the secret api_key (bail if mismatch)
		if ( ! $this->verifyApiKey( $request) )
			return $this->respondForbidden( 'Invalid Api Key' );

		// Where is the data coming from? (bail if it's not sent)
		if ( ! $source = $request->get( 'source', FALSE ) )
			return $this->respondInvalidRequest( 'No \'source\' param passed' );

		// Can we handle the source?
		if ( ! class_exists( 'campaignly\Sevices\ImportFrom'.$source ) )
			return $this->respondInvalidRequest( 'The \'source\' param does not match an ImportFrom service' );

		// OK, now we have a good response, process this data





		// Ok, find, and load that transformer

	}

	private function verifyApiKey( $request )
	{
		// Make sure we have an API key & it matches
		$incomingKey = $this->response->get( 'incoming_key', FALSE );
		if ( !  $incomingKey OR $incomingKey !== env( 'INCOMING_API_KEY' ) )
			return false;

		return true;
	}

}