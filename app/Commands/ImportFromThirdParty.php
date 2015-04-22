<?php namespace Campaignly\Commands;

use Campaignly\Contracts\ContactRepositoryInterface;
use Campaignly\Transformers\TransformerInterface as Transformer;
use Illuminate\Contracts\Bus\SelfHandling;

class ImportFromThirdParty extends Command implements SelfHandling {

	/** The transformer class that converts incoming data to
	 * a format ready to store in our DB
	 * @var
	 */
	private $transformer;

	/** Holds the raw data from the request
	 * @var array
	 */
	private $input;

	/**
	 * Create a new command instance.
	 *
	 * @param Transformer $transformer
	 * @param array $input
	 */
	public function __construct( Transformer $transformer, array $input )
	{
		$this->transformer = $transformer;
		$this->input = $input;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle( ContactRepositoryInterface $contact )
	{
		// Map the data
		$input = $this->transformer->mapData($this->input);

		// Persist the record
		$contact->create($input);
		$contact->save();

		// Fire an event
		//*** note - the event listener may wnat to send out a notification via test or email. How do we handle this?

		dd('Import from 3rd party');
	}

}
