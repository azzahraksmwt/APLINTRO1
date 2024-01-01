<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        // Periksa apakah pengguna terautentikasi
        if (Auth::check()) {
            // Dapatkan peran (role) pengguna yang sedang login
            $userRole = Auth::user()->role;
            // Periksa apakah peran pengguna memiliki akses ke rute
            if (in_array($userRole, $allowedRoles)) {
                return $next($request);
            } else {
                return redirect('/unauthorized'); // Tolak akses
            }            
        }
        
        return redirect('/unauthorized'); // Tolak akses jika pengguna tidak terautentikasi
    }
}
