<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\Manager;
use App\Http\Controllers\Admin\Product;

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

    Route::get('/product_list', [Product::class, 'productList'])->name('product_list');
    Route::get('/product_form', [Product::class, 'productForm'])->name('product_form');
    Route::get('/product_delete', [Product::class, 'productDelete'])->name('product_delete');
    Route::post('/product_create', [Product::class, 'productCreate'])->name('product_create');
    Route::post('/product_variant_create', [Product::class, 'productVariantCreate'])->name('product_variant_create');
    Route::get('/product_variant_delete', [Product::class, 'productVariantDelete'])->name('product_variant_delete');
});
