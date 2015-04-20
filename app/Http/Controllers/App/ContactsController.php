<?php namespace Campaignly\Http\Controllers\App;

use Campaignly\Contracts\ContactRepositoryInterface as ContactRepo;
use Campaignly\Http\Requests\App\StoreContactRequest;

class ContactsController extends BaseController {

	/**
	 * @var ContactRepo
	 */
	private $repo;

	function __construct( ContactRepo $repo ) {
		$this->repo = $repo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = 'all contacts';
		return view('app.contacts.index')->withResults($contacts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('app.contacts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ContactRequest|Request|StoreContactRequest $request
	 *
	 * @return Response
	 */
	public function store( StoreContactRequest $request)
	{
		return $this->repo->create($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
