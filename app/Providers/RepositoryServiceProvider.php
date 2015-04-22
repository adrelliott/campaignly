<?php  namespace Campaignly\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$this->bootRepositories();
	}

	private function bootRepositories() {
		// Bind the Users Interfaces
		$this->app->bind(
			'Campaignly\Contracts\Users\TenantRepositoryInterface',
			'Campaignly\Repositories\Users\FileTenantConfig'
		);

		// Bind the Contacts Interfaces
		$this->app->bind(
			'Campaignly\Contracts\Crm\ContactRepositoryInterface',
			'Campaignly\Repositories\Crm\DbContactRepository'
		);
	}
}