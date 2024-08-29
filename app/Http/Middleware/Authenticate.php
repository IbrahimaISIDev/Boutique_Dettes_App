<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Si la requête attend une réponse JSON, ne redirigez pas, mais retournez null
        if ($request->expectsJson()) {
            return null;
        }

        // Sinon, redirigez vers la page de login
        return route('login');
    }
}
