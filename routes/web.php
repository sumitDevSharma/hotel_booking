<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\{BookingController,HomeController,AdminController,LocationController};

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hotel/{hotel}', [HomeController::class, 'hotel'])->name('home.hotel');
Route::get('/hotel/booking/{hotel}/{room}', [HomeController::class, 'booking'])->name('home.booking');



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
Route::get('/hotels-ajax', [HotelController::class, 'getHotelsAjax'])->name('admin.hotels.ajax');
Route::delete('hotels-image/{image}', [HotelController::class, 'deleteImage'])->name('hotels.image.delete');

Route::resource('rooms', RoomController::class);
Route::get('/rooms-ajax', [RoomController::class, 'getRoomsAjax'])->name('admin.rooms.ajax');
Route::delete('rooms-image/{image}', [RoomController::class, 'deleteImage'])->name('rooms.image.delete');


Route::resource('bookings', BookingController::class);

Route::resource('users', UserController::class);    

Route::get('admin/locations', [LocationController::class, 'index'])->name('admin.locations');
Route::post('admin/locations/create', [LocationController::class, 'store'])->name('admin.locations.store');
Route::put('admin/locations/{location}', [LocationController::class, 'update'])->name('admin.locations.update');    
Route::delete('admin/locations/{location}', [LocationController::class, 'destroy'])->name('admin.locations.destroy');
Route::get('/locations-ajax', [LocationController::class, 'getLocationsAjax'])->name('admin.locations.ajax');



Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
