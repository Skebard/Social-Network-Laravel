<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class VerifyAccountOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->route()->parameters()['username']!==Auth::user()->username){
            $message = 'You are not allowed in this page';
            return view('error',compact('message'));
        }
        return $next($request);
    }
}
