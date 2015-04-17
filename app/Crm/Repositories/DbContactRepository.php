<?php  namespace campaignly\Crm\Repositories;

use campaignly\Contracts\ContactRepositoryInterface;
use campaignly\Crm\Contact;
use Auth;

class DbContactRepository extends BaseRepository implements ContactRepositoryInterface  {

	function __construct(Contact $contact) {
		$this->model = $contact;
	}


	public function setOrganisationId( $contact_id, $organisation_id ) {
		// TODO: Implement setOrganisationId() method.
	}
}