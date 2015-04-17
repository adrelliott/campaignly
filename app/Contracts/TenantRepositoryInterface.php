<?php namespace campaignly\Contracts;

interface TenantRepositoryInterface {

	// defines how we access the tenant model/config

	public function getPreferences();
	public function getId();
}