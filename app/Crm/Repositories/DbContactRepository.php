<?php  namespace Campaignly\Crm\Repositories;

use Campaignly\Contracts\ContactRepositoryInterface;
use Campaignly\Crm\Contact;
use Auth;

class DbContactRepository extends BaseRepository implements ContactRepositoryInterface  {

	function __construct(Contact $contact) {
		$this->model = $contact;
	}


	public function setOrganisationId( $contact_id, $organisation_id ) {
		// TODO: Implement setOrganisationId() method.
	}
}