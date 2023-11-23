<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        //Log::info('Debugging information: ' . $request);
        //echo auth()->user()->has_setup;
        if(!auth()->user()->has_setup && auth()->user()->role == 'mahasiswa' && $request->path() != 'user/mahasiswa/profile'){
            return redirect('user/mahasiswa/profile');
        }
        if(auth()->user()->role == $role){
            return $next($request);
        }
        return redirect('user');
    }
}
