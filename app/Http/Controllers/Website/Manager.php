<?php

namespace App\Http\Controllers\Website;

class Manager
{
    public static function home()
    {
        return view('website.home', [
                'page' => 'home'
        ]);
    }

    public static function terms()
    {
        return view('website.terms', [
            'page' => 'terms'
        ]);
    }

    public static function catalog()
    {
        return view('website.catalog', [
            'page' => 'catalog'
        ]);
    }

    public static function lgpd()
    {
        return view('website.lgpd', [
            'page' => 'lgpd'
        ]);
    }
}
