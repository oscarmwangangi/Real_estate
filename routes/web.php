<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealtorListingController;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);

Route::resource('/listings', ListingController::class)
->only(['index', 'show']);


Route::prefix('realtor')
  ->name('realtor.')
 ->middleware('auth')
  ->group(function () {
    
Route::name('listing.restore')
    ->put(
    'listing/{listing}/restore',
    [RealtorListingController::class, 'restore']
    )->withTrashed();


    Route::resource('listings', RealtorListingController::class)
       ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
      ->withTrashed();
  });
  
require __DIR__.'/auth.php';
