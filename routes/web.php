<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;

Route::resource('tickets', TicketController::class);
Route::patch('/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::get('/home', function () {
    return redirect()->route('tickets.index');
});

Route::get('password/reset/{token}/{email}', [PasswordResetController::class, 'showResetForm']);

Auth::routes();
Route::get('/', [TicketController::class, 'index'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    Route::patch('/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
    Route::resource('tickets', App\Http\Controllers\TicketController::class);
});
