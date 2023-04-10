<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use jeremykenedy\laravelroles\Models\Role;

class VerifyRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        foreach ($roles as $role) {
            if ($user->roles($role)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
