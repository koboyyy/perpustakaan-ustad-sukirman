<?php

use Laravel\Fortify\Features;

return [

    // ... (config tetap sama sampai sebelum 'home')

    /*
    |--------------------------------------------------------------------------
    | Home Path
    |--------------------------------------------------------------------------
    |
    | Redirect ke dashboard jika login sebagai admin, 
    | atau ke home jika login sebagai pengunjung.
    | Menggunakan closure untuk menentukan redirect path berdasarkan role.
    */
    'home' => function () {
        $user = auth()->user();
        // Jika user tidak ada (belum login), fallback ke '/home'
        if (!$user)
            return '/home';
        // Jika memakai field 'role' pada tabel users untuk mendeteksi admin
        if ($user->role === 'admin') {
            return '/dashboard';
        }
        // Default redirect untuk role lain (misal: pengunjung)
        return '/home';
    },

    /*
    |--------------------------------------------------------------------------
    | Fortify Routes Prefix / Subdomain
    |--------------------------------------------------------------------------
    |
    */

    'prefix' => '',

    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Fortify Routes Middleware
    |--------------------------------------------------------------------------
    |
    */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting
    |--------------------------------------------------------------------------
    |
    */

    'limiters' => [
        'login' => 'login',
        'two-factor' => 'two-factor',
    ],

    /*
    |--------------------------------------------------------------------------
    | Register View Routes
    |--------------------------------------------------------------------------
    |
    */

    'views' => true,

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Registration is enabled as in the login form there's a "Daftar" link.
    | Email verification and password resets are enabled.
    */

    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
    ],

];
