<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// user routes
Route::middleware(["auth"])->group( function () {
    Route::get("/", [ProductController::class, "landing"])->name("home");
    
    Route::prefix("/products/")->group( function () {
        Route::get("{product}", [ProductController::class, "show"])->name("product.show");
    });
    
    Route::prefix("/cart/")->group( function ()
    {
        Route::post("purchase/", [PurchaseController::class, "store"]);
        Route::post("store/{product}", [CartController::class, "store"])->name("cart.add");

        Route::get("", [CartController::class, "show"])->name("cart.show");
        
        Route::get("remove/{product}", [CartController::class, "remove"]);
        Route::get("delete/", [CartController::class, "delete"]);
    });


});

// admin routes
Route::middleware(["auth"])->group( function () {    
    
    Route::prefix("/products/")->group( function () {
        Route::post("store/", [ProductController::class, "store"]);
        
        Route::put("update/{product}", [ProductController::class, "update"])->name("product.update");
    
        Route::delete("delete/{product}", [ProductController::class, "delete"]);
    });

});