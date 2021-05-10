<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
	{
		$roles = $this->getRequiredProfileForRoute($request->route());

		if(!$roles || in_array($request->user()->profile_id, $roles))
		{
			return $next($request);
		}
		return abort(401);
	}

	private function getRequiredProfileForRoute($route)
	{
		$actions = $route->getAction();
		return isset($actions['profile']) ? $actions['profile'] : null;
	}
}
