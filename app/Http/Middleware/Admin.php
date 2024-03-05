<?php

// app/Http/Middleware/Admin.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}


