<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;



class AuthenticateAdmin extends Authenticate
{
    protected function authenticate($request, array $guards)
    {
        parent::authenticate($request, $guards);
        Gate::authorize('dashboard');
    }
}
