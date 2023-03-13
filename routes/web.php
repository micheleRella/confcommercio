<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserVendorController;
use Geocoder\Laravel\ProviderAndDumperAggregator as Geocoder;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /* city routes */
    Route::get('/city/create', [CitiesController::class, 'create'])->name('city.create');
    Route::get('/city/index', [CitiesController::class, 'index'])->name('city.index');
    Route::get('/city/edit/{id}', [CitiesController::class, 'edit'])->name('city.edit');
    Route::delete('/city/destroy/{id}', [CitiesController::class, 'destroy'])->name('city.destroy');

    /* shop routes */
    Route::get('/shop/create', [ShopController::class, 'create'])->name('shop.create');
    Route::get('/shop/index', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/edit/{id}', [ShopController::class, 'edit'])->name('shop.edit');
    Route::delete('/shop/destroy/{id}', [ShopController::class, 'destroy'])->name('shop.destroy');
    Route::post('/shop/index/import', [ShopController::class, 'import'])->name('shop.import');

    /* user routes */
    Route::get('/user/create', [UserVendorController::class, 'create'])->name('user.create');
    Route::get('/user/index', [UserVendorController::class, 'index'])->name('user.index');
    Route::get('/user/edit/{id}', [UserVendorController::class, 'edit'])->name('user.edit');
    Route::delete('/user/destroy/{id}', [UserVendorController::class, 'destroy'])->name('user.destroy');
});


Route::middleware(['auth', 'vendor'])->group(function () {
    Route::get('/vendor/shop', [UserVendorController::class, 'vendorShop'])->name('vendor.shop');
});


require __DIR__.'/auth.php';
