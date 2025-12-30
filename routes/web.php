<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\CinemaController as AdminCinemaController;
use App\Http\Controllers\Admin\StudioController as AdminStudioController;
use App\Http\Controllers\Admin\ShowtimeController as AdminShowtimeController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home & Movies
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/movies', [HomeController::class, 'movies'])->name('movies.index');
Route::get('/movies/{movie}', [HomeController::class, 'showMovie'])->name('movies.show');

// Help Page
Route::get('/help', function () {
    return view('help');
})->name('help');

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| User Routes (Authenticated)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Booking Flow
    Route::get('/booking/{showtime}/seats', [BookingController::class, 'selectSeats'])->name('booking.seats');
    Route::post('/booking/{showtime}/seats', [BookingController::class, 'processSeats']);
    Route::get('/booking/{booking}/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
    Route::post('/booking/{booking}/pay', [BookingController::class, 'processPayment'])->name('booking.pay');
    Route::get('/booking/{booking}/ticket', [BookingController::class, 'showTicket'])->name('booking.ticket');
    Route::get('/booking/{booking}/ticket/download', [BookingController::class, 'downloadTicket'])->name('booking.ticket.download');
    Route::post('/booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    
    // User Bookings
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my-bookings');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Movies
    Route::resource('movies', AdminMovieController::class);
    Route::get('/movies-search-tmdb', [AdminMovieController::class, 'searchTmdb'])->name('movies.search-tmdb');
    Route::post('/movies-import-tmdb', [AdminMovieController::class, 'importTmdb'])->name('movies.import-tmdb');
    
    // Cinemas
    Route::resource('cinemas', AdminCinemaController::class);
    
    // Studios
    Route::resource('studios', AdminStudioController::class);
    Route::post('/studios/{studio}/regenerate-seats', [AdminStudioController::class, 'regenerateSeats'])->name('studios.regenerate-seats');
    
    // Showtimes
    Route::resource('showtimes', AdminShowtimeController::class)->except(['show']);
    Route::post('/showtimes-bulk', [AdminShowtimeController::class, 'bulkCreate'])->name('showtimes.bulk');
    
    // Bookings
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');
    Route::post('/bookings/{booking}/cancel', [AdminBookingController::class, 'cancel'])->name('bookings.cancel');
    Route::post('/bookings/{booking}/approve', [AdminBookingController::class, 'approvePayment'])->name('bookings.approve');
    Route::post('/bookings/{booking}/reject', [AdminBookingController::class, 'rejectPayment'])->name('bookings.reject');
    
    // Reports
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/sales', [AdminReportController::class, 'salesReport'])->name('reports.sales');
    Route::get('/reports/movies', [AdminReportController::class, 'movieReport'])->name('reports.movies');
});

