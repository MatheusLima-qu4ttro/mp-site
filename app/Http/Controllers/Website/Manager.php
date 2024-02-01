<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Facades\DB;

class Manager
{
    public static function home()
    {
        $company = DB::table('generals')->where('id', 1)->first();
        $slides = DB::table('slides')->orderBy('order')->get();

        $categoriesArray = self::getCategories();

        return view('website.home', [
            'page' => 'home',
            'company' => $company,
            'slides' => $slides,
            'categories' => $categoriesArray
        ]);
    }

    public static function terms()
    {
        $company = DB::table('generals')->where('id', 1)->first();
        $categoriesArray = self::getCategories();

        return view('website.terms', [
            'page' => 'terms',
            'company' => $company,
            'terms' => $company->terms_and_conditions,
            'categories' => $categoriesArray
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
        $company = DB::table('generals')->where('id', 1)->first();
        $categoriesArray = self::getCategories();

        return view('website.lgpd', [
            'page' => 'lgpd',
            'company' => $company,
            'lgpd' => $company->lgpd,
            'categories' => $categoriesArray
        ]);
    }

    private static function getCategories() {
        $categoriesArray = array();
        $categories = DB::table('categories')->get();
        foreach ($categories as $category) {
            $arr                = array();
            $arr[$category->id] = $category->name;
            if (!$category->parent_id) {
                $categoriesArray[$category->id] = $arr;
            } else {
                $categoriesArray[$category->parent_id][$category->id] = $arr;
            }
        }

        return $categoriesArray;
    }
}
