<?php namespace Campaignly\Http\Controllers\Queue;

use Illuminate\Http\Request;

class QueuesController extends BaseController {

	/**
	 * @var Request
	 */
	private $request;

	function __construct( Request $request) {
		$this->request = $request;
	}

	public function add() {
		if( $this->checkToken() )
		{
			//handle the task
			return 'Handling add queue';

		}

	}

	private function checkToken() {
		$expected = env('IRON_SECRET');
		$actual = $this->request->get('IronSecret', FALSE);

		if ( $actual !== $expected )
			return false;

		return true;
	}
}