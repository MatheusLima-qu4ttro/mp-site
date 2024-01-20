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

    public static function about()
    {
        return view('website.about', [
            'page' => 'about'
        ]);
    }

    public static function catalog()
    {
        return view('website.catalog', [
            'page' => 'catalog'
        ]);
    }

    public static function contact()
    {
        return view('website.contact', [
            'page' => 'contact'
        ]);
    }
}
