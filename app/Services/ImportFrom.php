<?php namespace campaignly\Services;


interface ImportFrom {

	/** Takes the incoming data and maps to the $map array
	 * set in the implementation
	 *
	 * @param array $incomingData
	 * @return mixed
	 */
	public function mapData( array $incomingData );

}