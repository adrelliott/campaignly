<?php  namespace campaignly\Http\ViewComposers;

//use campaignly\UserProfile\Tenant;
use Illuminate\Contracts\View\View;
use campaignly\Contracts\TenantRepositoryInterface as Tenant;

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