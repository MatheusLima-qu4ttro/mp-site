<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Manager
{
    public static function home(Request $request)
    {
        $company = DB::table('generals')->where('id', 1)->first();
        $slides = DB::table('slides')->orderBy('order')->get();

        $categoriesArray = self::getCategories();

        $variants = DB::table('product_variants')->select('product_variants.*', 'products.name')
            ->leftJoin('products', 'products.id', '=', 'product_variants.product_id')
            ->when($request->category_id, function ($query, $category_id) {
                return $query->where('products.category_id', $category_id);
            })
            ->when($request->search, function ($query, $search) {
                return $query->where('products.name', 'LIKE', '%'.$search.'%');
            })
            ->get();

        foreach ($variants as $variant) {
            $img = DB::table('product_images')
                ->where('product_variant_id', '=', $variant->id)
                ->where('is_main', '=', 1)
                ->first();
            if ($img) {
                $variant->path = $img->path;
            }
        }

        if($request->category_id){
            $categorySelected = DB::table('categories')->select('categories.name')->where('id', $request->category_id)->first()->name;
        }

        return view('website.home', [
            'page' => 'home',
            'company' => $company,
            'slides' => $slides,
            'categories' => $categoriesArray,
            'products' => $variants,
            'categorySelected' => $categorySelected ?? "Todos"
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
