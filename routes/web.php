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


    /** PROFILE ROUTES */
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
    /** END PROFILE ROUTES */


    /* CITIES ROUTES */
    Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
        Route::get('/create', [CitiesController::class, 'create'])->name('create');
        Route::get('/index', [CitiesController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [CitiesController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [CitiesController::class, 'destroy'])->name('destroy');
    });
    /* END CITIES ROUTES */

    /* SHOP ROUTES */
    Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {
        Route::get('/create', [ShopController::class, 'create'])->name('create');
        Route::get('/index', [ShopController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [ShopController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [ShopController::class, 'destroy'])->name('destroy');
        Route::post('/index/import', [ShopController::class, 'import'])->name('import');
    });
    /** END SHOP ROUTES */

    /** USER ROUTES */
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/create', [UserVendorController::class, 'create'])->name('create');
        Route::get('/index', [UserVendorController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [UserVendorController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [UserVendorController::class, 'destroy'])->name('destroy');
    });
    /* END USER ROUTES */
});


Route::middleware(['auth', 'vendor'])->group(function () {
    Route::get('/vendor/shop', [UserVendorController::class, 'vendorShop'])->name('vendor.shop');
});


require __DIR__ . '/auth.php';
