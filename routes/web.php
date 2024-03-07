<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\organizer\OrganizerController;
use App\Models\bookings;

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

Route::middleware(['auth', 'blocked'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [UsersController::class, 'index'])->name('admin.user.index');
    Route::patch('/admin/blockUser/{userId}', [UsersController::class, 'blockUser'])->name('admin.blockUser');
    Route::get('/admin/category', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/addcategory', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/add', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/admin/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');

    Route::put('/admin/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');

    Route::delete('/admin/delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    Route::get('/admin/events', [EventsController::class, 'events'] )->name('admin.events.index');

    Route::put('/admin/events/valid/{id}', [EventsController::class, 'valid'])->name('admin.validEvent');

});

Route::middleware(['auth', 'role:organizer'])->group(function () {
    Route::get('/or', [EventsController::class, 'index'])->name('organizer.index');
    Route::get('/reservations', [BookingsController::class, 'reservations'])->name('organizer.reservation');
    Route::get('/organizer', [EventsController::class, 'create'])->name('organizer.user.index');
    Route::post('/create-event', [EventsController::class, 'store'])->name('events.store');
    Route::patch('/accept/{booking}', [BookingsController::class, 'accept'])->name('bookings.accept');


});

Route::middleware(['auth' , 'role:user'])->group(function () {
    Route::get('/user', [BookingsController::class, 'index'])->name('user.index');
    Route::post('/user/reserve/{event}', [BookingsController::class, 'reserve'])->name('user.reserve');

    Route::post('/filtrage', [EventsController::class, 'filtre'])->name('events.filtre');

});

require __DIR__.'/auth.php';
