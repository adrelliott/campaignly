<?php  namespace campaignly\Providers;

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
			'campaignly\Contracts\TenantRepositoryInterface',
			'campaignly\UserProfile\FileTenantConfig'
		);

		// Bind the UserProfile Interfaces
		$this->app->bind(
			'campaignly\Contracts\ContactRepositoryInterface',
			'campaignly\Crm\Repositories\DbContactRepository'
		);
	}
}