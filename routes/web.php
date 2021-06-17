<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuotationController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/index',[AcceuilController::class,'index'])->name('index');
Route::get('/shop',[ProductController::class, 'shop'])->name('shop');
Route::post('/shop',[ProductController::class, 'store'])->name('store');
Route::get('/shop/{s}',[ProductController::class, 'shopByCategory'])->name('category_shop');
Route::get('/products/show/{product}',[ProductController::class, 'show']);
Route::get('/about',[AcceuilController::class, 'about'])->name('about');
Route::get('/contact',[AcceuilController::class, 'contact'])->name('contact');
Route::post('/contact',[AcceuilController::class, 'save_contact'])->name('save_contact');
Route::get('/quotation',[QuotationController::class, 'show'])->name('show_quotation');
Route::get('/quotation/download',[QuotationController::class, 'download'])->name('download_quotation');
Route::post('/quotation/final',[QuotationController::class, 'checkout'])->name('checkout');
Route::get('/quotation/print',[QuotationController::class, 'print'])->name('print');
Route::get('/quotation/{quotation}/delete/{quoteline}',[QuotationController::class, 'delete']);
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
