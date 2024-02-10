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

        $variants = DB::table('product_variants')->get();
        foreach ($variants as $variant) {
            $img = DB::table('product_images')
                ->where('product_variant_id', '=', $variant->id)
                ->where('is_main', '=', 1)
                ->first();
            if ($img) {
                $variant->path = $img->path;
            }
        }

        return view('website.home', [
            'page' => 'home',
            'company' => $company,
            'slides' => $slides,
            'categories' => $categoriesArray,
            'products' => $variants
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

    private static function getCategories($parentId = null) {
        $categories = DB::table('categories')
            ->where('parent_id', $parentId)
            ->get();

        $categoriesArray = array();

        foreach ($categories as $category) {
            $arr = array();
            $arr['id'] = $category->id;
            $arr['name'] = $category->name;

            // Recursivamente obter subcategorias
            $subcategories = self::getCategories($category->id);
            if (!empty($subcategories)) {
                $arr['subcategories'] = $subcategories;
            }

            $categoriesArray[] = $arr;
        }

        return $categoriesArray;
    }
}
