<?php  namespace campaignly\Services;

class ImportFromMailchimp implements ImportFrom {

	private $map = [
		'FNAME' => 'first_name',
		'LNAME' => 'last_name',
		'EMAIL' => 'email',
		'CONTACTNUM' => 'phone',
		'MOBILE' => 'mobile',
	];

	/** Takes the incoming data and maps to the $map array
	 * set in the implementation
	 *
	 * @param array $incomingData
	 *
	 * @return mixed
	 */
	public function mapData( array $incomingData ) {
		// The mailchimp data we want is in the $data['merges'] dim
		$data = $incomingData['merges'];

		// Now
	}}