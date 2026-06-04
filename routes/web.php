<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\PartnerController;

// Rute User Area
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [TicketController::class, 'ticket'])->name('ticket');

Route::get('/katalog', function() {
    return view('catalog');
});
Route::get('/bantuan', function() {
    return view('bantuan');
});
Route::get('/contact', function() {
    return view('contact');
});
Route::get('/profil', function() {
    return view('profile');
});

// Rute Admin Area

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // Rute Bebas Akses untuk Login 
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rute yang Dilindungi oleh Middleware Auth (Transaksi)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/', [DashboardController::class, 'index']);
        Route::resource('/events', EventAdminController::class);
        Route::resource('/partners', PartnerController::class);
        Route::resource('/categories', CategoryController::class);
        Route::get('/transactions', [TransactionController::class, 'transactionsAdmin'])->name('transactions.index');
    });

    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Route::resource('/events', EventAdminController::class);

    // Route::get('/transactions', [DashboardController::class, 'transactionsAdmin'])->name('transactions.index');

    // Route::resource('/partners', PartnerController::class);
    
    // Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
});
