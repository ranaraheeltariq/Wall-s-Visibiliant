<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConcController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\MarketVisitReportController;

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


Auth::routes(['register' => false]);
Route::middleware(['auth', 'verified'])->group(function () {
    // Main Route
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // User Routes
    Route::get('/add/user',[HomeController::class,'create'])->name('user.add');
    Route::post('/add-user',[HomeController::class,'store'])->name('add user');
    Route::get('/users',[HomeController::class, 'users'])->name('users');
    Route::get('/profile/users/{user?}',[HomeController::class,'show'])->name('profile');
    Route::put('password/{user}',[HomeController::class,'update'])->name('password');
    Route::get('/edit/{user}/user',[HomeController::class,'edit'])->name('user.edit');
    Route::delete('/uers/{user}',[HomeController::class,'destroy'])->name('user.remove');
    Route::get('/getconc', [ConcController::class,'getconc'])->name('getconc');
    Route::get('/getterritory', [TerritoryController::class,'getterritory'])->name('territory');
    // Market Visit Report Routes
    Route::get('add/marketvisitreport', [MarketVisitReportController::class,'create'])->name('add report');
    Route::post('/marketvisitreport', [MarketVisitReportController::class, 'store'])->name('store report');
    Route::post('/download-report',[MarketVisitReportController::class, 'trerritoryreport'])->name('download report');
    
});
