<?php  namespace Campaignly\Contracts\Users;

interface TenantRepositoryInterface {

	// Handles the config for each tenant

	public function getPreferences();
	public function getId();
}