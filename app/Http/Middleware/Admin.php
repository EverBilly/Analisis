<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth; 
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->id != 1) {
            return back()->with('error', 'Usuario sin Privilegios');
            return redirect()->to('login');
        }
        return $next($request);
    }
}
