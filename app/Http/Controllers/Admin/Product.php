<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class Product
{
    public static function createProduct()
    {
        return view('admin.product.form', [
            'page' => 'product_create'
        ]);
    }
}
