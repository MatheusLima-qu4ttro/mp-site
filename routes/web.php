<?php

use App\Http\Controllers\Admin\SiteSettings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\Manager;

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
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    //route for the site settings
    Route::get('/site-settings', [SiteSettings::class, 'index'])->name('site-settings');


});
