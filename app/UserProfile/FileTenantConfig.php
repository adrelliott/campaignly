<?php  namespace campaignly\UserProfile;

//use campaignly\Contracts\TenantRepositoryInterface;
use campaignly\Contracts\TenantRepositoryInterface;
use Config, File;

class FileTenantConfig implements TenantRepositoryInterface {

	// This is the Config based implementation - we will move to a DB based one soon

	/**
	 * @return array
	 */
	public function getPreferences() {
		$baseConfig = Config::get('tenants.config');
		$tenantConfig = $this->getTenantConfig();
		return array_merge( $baseConfig, $tenantConfig);
	}

	/**
	 * @return int
	 */
	public function getId() {
		// TODO: Implement getId() method.
		return 12345;
	}

	/** Check for a config file for this tenant
	 * @return array
	 */
	private function getTenantConfig() {
		if ( ! $tenantConfig = Config::get('tenants.' . $this->getId()) )
			return ['tenant_id' => $this->getId()];
		return $tenantConfig + ['tenant_id' => $this->getId()];
	}
}