<?php namespace Campaignly\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	private $skipRoutes = [
		'incoming/contacts/store',
	];

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//disable CSRF check on following routes
		foreach ($this->skipRoutes as $key => $route) {
			if($request->is($route)){
				return parent::addCookieToResponse($request, $next($request));
			}
		}
		return parent::handle($request, $next);
	}

}
