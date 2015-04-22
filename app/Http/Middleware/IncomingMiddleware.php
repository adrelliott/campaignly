<?php namespace Campaignly\Http\Middleware;

use Closure, Response;

class IncomingMiddleware {

	/**
	 * Handle an incoming request. If the token does not match
	 * then return a forbidden code
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$incomingKey = $request->get('incomingKey', FALSE);
		if ( !  $incomingKey OR $incomingKey !== env('INCOMING_API_KEY'))
			return Response::HTTP_FORBIDDEN;

		return $next($request);
	}

}
