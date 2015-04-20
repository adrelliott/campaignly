<?php  namespace Campaignly\Http\ViewComposers;

//use Campaignly\UserProfile\Tenant;
use Illuminate\Contracts\View\View;
use Campaignly\Contracts\TenantRepositoryInterface as Tenant;

class ProfileComposer {


	/**
	 * @var Tenant
	 */
	private $tenant;

	function __construct(Tenant $tenant ) {
		$this->tenant = $tenant;
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('profile', $this->tenant->getPreferences());
		$view->with('tenant_id', $this->tenant->getId());
	}
}