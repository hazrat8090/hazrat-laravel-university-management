<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleUniversityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role, int $university_id): Response
    {

        if (Auth::check()) {
            /** @var \App\Models\User */
            $user = Auth::user();
            if ($user && $user->hasRole($role) && $user->$university_id = $university_id) {

                return $next($request);
            }
            abort(403, 'شما اجازه دسترسی به این قسمت از سیستم را ندارید، برای دسترسی به این قسمت از سیستم باید سوپر ادمین باشید!');
        }
        abort(401);
    }
}
