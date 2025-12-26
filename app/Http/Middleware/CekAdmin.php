<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect('viewLogin');
        }

        if (Auth::user()->username !== 'admin') {
            abort(403, 'Stop, Tidak punya akses bro!!');
        }

        return $next($request); // Lanjutkan request ke controller
    }
}
