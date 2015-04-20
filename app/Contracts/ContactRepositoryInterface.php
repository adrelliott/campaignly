<?php namespace Campaignly\Contracts;


interface ContactRepositoryInterface extends BaseRepositoryInterface {

	// Contact Specific methods
	public function setOrganisationId( $contact_id, $organisation_id );

	// Child resources
}