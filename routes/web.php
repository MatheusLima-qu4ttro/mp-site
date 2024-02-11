<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\Manager;
use App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Admin\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Manager::class, 'home'])->name('home');
Route::get('/product_modal', [Manager::class, 'productModal'])->name('product_modal');
Route::get('/terms', [Manager::class, 'terms'])->name('terms');
Route::get('/catalog', [Manager::class, 'catalog'])->name('catalog');
Route::get('/lgpd', [Manager::class, 'lgpd'])->name('lgpd');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //product routes
    Route::get('/product_list', [Product::class, 'productList'])->name('product_list');
    Route::get('/product_form', [Product::class, 'productForm'])->name('product_form');
    Route::get('/product_delete', [Product::class, 'productDelete'])->name('product_delete');
    Route::post('/product_create', [Product::class, 'productCreate'])->name('product_create');
    Route::post('/product_variant_create', [Product::class, 'productVariantCreate'])->name('product_variant_create');
    Route::get('/product_variant_delete', [Product::class, 'productVariantDelete'])->name('product_variant_delete');

    //category routes
    Route::get('/category_list', [Category::class, 'categoryList'])->name('category_list');
    Route::get('/category_form', [Category::class, 'categoryForm'])->name('category_form');
    Route::get('/category_delete', [Category::class, 'categoryDelete'])->name('category_delete');
    Route::post('/category_create', [Category::class, 'categoryCreate'])->name('category_create');

    //configurations routes
    Route::get('/website_form', [Configurations::class, 'websiteForm'])->name('website_form');


});
