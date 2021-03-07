<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
		$roles = $this->getRequiredRoleForRoute($request->route());

		if(!$roles || in_array($request->user()->role, $roles))
		{
			return $next($request);
		}
		return abort(401);
	}
	private function getRequiredRoleForRoute($route)
	{
		$actions = $route->getAction();
		return isset($actions['role']) ? $actions['role'] : null;
	}
}
