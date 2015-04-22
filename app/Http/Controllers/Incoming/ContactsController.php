<?php  namespace Campaignly\Http\Controllers\Incoming;

use Campaignly\Commands\ImportFromThirdParty;
use Campaignly\Http\Requests\Incoming\StoreContactRequest;
use Campaignly\Traits\ApiResponses;
use Campaignly\Transformers\MailchimpTransformer;

class ContactsController  extends BaseController {

	use ApiResponses;


	/**
	 * @param Request $request
	 */
	public function storeWebhook( StoreContactRequest $request )
	{
		dd('got here');
//		// Firstly, verify the token
//		if ( ! $this->verifyApiKey($request))
//			return $this->respondForbidden('Invalid Api Key');

		// Now work out what webhook it is & call the right command
		$source = $request->get('source', false);
		dd($source);
		switch ($source)
		{
			case 'mailchimp':
				$transformer = new MailchimpTransformer;
				$this->dispatch( new ImportFromThirdParty($transformer, $request->input));

			case false:
				return $this->respondInvalidRequest('No \'source\' param passed');

			default:
				return $this->respondInvalidRequest('Oops. Cannot support incoming data from ' . $source . ' yet.');


		}
		// Finally respond accordingly
		return $this->respondOk('Data accepted & queued');
	}



	/**
	 * Handles things like webforms submitted from other websites,
	 * or incoming API calls.
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
		if ( ! in_array( $source, $this->allowableSources ) )
			return $this->respondInvalidRequest( 'Oops. Cannot support incoming data from ' . $source . ' yet.' );

		// OK, now we have a good response, process this data
		$this->dispatchFrom('Campaignly\Commands\ImportFromThirdParty', $request);





		// Ok, find, and load that transformer

	}



	/** Some webhooks (namely MailChimp) need to run a one-time validation.
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function verifyWebhook()
	{
		return $this->respondOk( 'This URL is for validation only - no data is processed' );
	}

}