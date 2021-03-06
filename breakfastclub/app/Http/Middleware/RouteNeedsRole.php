<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsRole
{

	/**
     * @param $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! access()->hasRole($role)) {
            return redirect()->back()
//                ->route('frontend.index')
                ->withFlashDanger(trans('auth.general_error'));
        }

        return $next($request);
    }
}