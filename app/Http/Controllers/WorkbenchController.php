<?php  namespace Campaignly\Http\Controllers;

class WorkbenchController extends Controller{

	public function test_env( )
	{
		var_dump(env('IRON_TOKEN'));
		var_dump(env('IRON_PROJECT_ID'));
	}

	public function test_queue( )
	{
		// test the quueue. Imagine we are registering a new user
		
	}
}