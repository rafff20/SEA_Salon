<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page'
    ]);
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/signup', [RegisterController::class, 'store'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/reservation', function () {
        return view('reservation', [
            'title' => 'Reservation Page'
        ]);
    })->name('reservation.form');

    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});

Route::get('/review', [RatingController::class, 'index'])->name('reviews.index');
Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
