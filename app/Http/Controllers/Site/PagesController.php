<?php namespace campaignly\Http\Controllers\Site;

use campaignly\Http\Requests;
use campaignly\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
	 * Homepage
	 *
	 * @return Response
	 */
	public function index() {
		return 'Homepage';
	}

	public function about()
	{
		return 'About us';
	}

	public function contact()
	{
		return 'Contact us';
	}

	public function register()
	{
		return 'Register page';
	}
}