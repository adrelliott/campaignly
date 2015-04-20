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
		// Bind the UserProfile Interfaces
		$this->app->bind(
			'Campaignly\Contracts\TenantRepositoryInterface',
			'Campaignly\UserProfile\FileTenantConfig'
		);

		// Bind the UserProfile Interfaces
		$this->app->bind(
			'Campaignly\Contracts\ContactRepositoryInterface',
			'Campaignly\Crm\Repositories\DbContactRepository'
		);
	}
}