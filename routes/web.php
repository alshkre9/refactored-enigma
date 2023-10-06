<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
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
        Route::get("show/{product}", [ProductController::class, "show"])->name("product.show");
        Route::post("cart/add/{product}", [CartController::class, "store"])->name("cart.add");
    });
    
    Route::prefix("/cart/")->group( function ()
    {
        Route::get("", [CartController::class, "show"])->name("cart.show");

        Route::post("purchase/", [PurchaseController::class, "store"]);
    
        Route::get("remove/{product}", [CartController::class, "remove"]);
        Route::get("delete/", [CartController::class, "delete"]);
    });
    

});

// admin routes
// use isAdmin middleware
Route::middleware(["auth", "isAdmin"])->group( function () {    
    
    Route::post("/image/upload/", ImageController::class);
    
    Route::prefix("/products/")->group( function () {

        Route::get("store/", [ProductController::class, "storeView"])->name("product.store.view");
        Route::post("store/", [ProductController::class, "store"])->name("product.store");
        
        Route::get("update/{product}", [ProductController::class, "updateView"])->name("product.update.view");
        Route::put("update/{product}", [ProductController::class, "update"])->name("product.update");
        
        Route::delete("delete/{product}", [ProductController::class, "delete"])->name("product.delete");
    });

});