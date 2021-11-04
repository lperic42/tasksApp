<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{

    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('LoggedUser') && ($request->path() != '/' && $request->path() != 'register')){
            return redirect('/')->with('fail', 'You must be logged in!');
        }

        if(session()->has('LoggedUser') && ($request->path() == '/'  || $request->path() == 'register')){
            return back();
        }

        return $next($request);
    }
}
