<?php  namespace campaignly\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot() {
		View::composer( 'app.*', 'campaignly\Http\ViewComposers\ProfileComposer' );
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
