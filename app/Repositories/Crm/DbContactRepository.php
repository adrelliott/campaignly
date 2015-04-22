<?php  namespace Campaignly\Repositories\Crm;

use Campaignly\Contracts\Crm\ContactRepositoryInterface;
use Auth;
use Campaignly\Contact;

class DbContactRepository extends BaseRepository implements ContactRepositoryInterface  {

	function __construct(Contact $contact) {
		$this->model = $contact;
	}


	public function setOrganisationId( $contact_id, $organisation_id ) {
		// TODO: Implement setOrganisationId() method.
	}
}