<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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

Route::middleware(["auth"])->group( function () {
    Route::get("/", [ProductController::class, "index"])->name("home");
    Route::get("/products/{product}", [ProductController::class, "show"])->name("product");
});

Route::middleware(["auth", "isAdmin"])->group( function () {
    Route::get("/products/store/", [ProductController::class, "store"]);
    Route::post("/products/store/", [ProductController::class, "store"]);
    Route::post("products/update/{product}", [ProductController::class, "update"]);
});