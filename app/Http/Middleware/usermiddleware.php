<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usermiddleware
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
       if(Auth::check() && Auth::user()->status)
       {
           $banned = Auth::user()->status == '0';
           Auth::logout();

           if($banned == 0){
               $message ="Your account has been Banned. Please contact administraor";
           }
           return redirect()->route('login')->with('status',$message)->withErrors(['email' =>'Your account has been Banned. Please contact administrator']);
       }
       return $next($request);
    }
}
