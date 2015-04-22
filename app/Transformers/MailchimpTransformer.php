<?php namespace Campaignly\Transformers;

class MailchimpTransformer implements TransformerInterface {

	/** The mapping from Mailchimp data to Campaignly data structure
	 * @var array
	 */
	private $map = [
		'FNAME' => 'first_name',
		'LNAME' => 'last_name',
		'EMAIL' => 'email',
		'CONTACTNUM' => 'phone',
		'MOBILE' => 'mobile',
	];

	/** Maps the data
	 * @param array $data
	 *
	 * @internal param $map
	 */
	public function mapData( array $data )
	{
		$result = [];
		foreach ( $data as $key => $value )
		{
			if ( array_key_exists( $key, $this->map ) )
			{
				$result[ $this->map[$key] ] = $value;
			}
		}
		return $result;
	}
}