<?php namespace Campaignly\Http\Controllers\Site;

use Campaignly\Http\Requests;
use Campaignly\Http\Controllers\Controller;

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