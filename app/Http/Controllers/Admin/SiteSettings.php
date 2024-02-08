<?php

namespace App\Http\Controllers\Admin;

class SiteSettings
{
    public static function index()
    {
        return view('admin.site-settings', [
                'page' => 'site-settings'
        ]);
    }
}
