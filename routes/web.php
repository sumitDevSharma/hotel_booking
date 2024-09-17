<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\{BookingController,HomeController,AdminController};

Route::get('/', [HomeController::class, 'index'])->name('home');


// clear cache 
Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect()->back()->with('success', 'Cache has been cleared');
})->name('clear.cache');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('hotels', HotelController::class);
Route::resource('rooms', RoomController::class);
Route::resource('bookings', BookingController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
