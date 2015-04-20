<?php  namespace Campaignly\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot() {
		View::composer( 'app.*', 'Campaignly\Http\ViewComposers\ProfileComposer' );
	}

		/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		// TODO: Implement register() method.
	}
}
