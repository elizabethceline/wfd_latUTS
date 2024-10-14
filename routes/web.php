<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MovieController;

Route::get('/movies', [MovieController::class, 'index'])->name('movies');

Route::get('/movies/tickets/{movie:id}', [MovieController::class, 'tickets'])->name('movie.tickets');

Route::get('/movies/book/{movie:id}', [MovieController::class, 'book'])->name('movie.book');

Route::post('/ticket/submit', [TicketController::class, 'store'])->name('ticket.store');

Route::put('/ticket/checkin/{ticket:id}', [TicketController::class, 'checkIn'])->name('ticket.checkin');

Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'delete'])->name('ticket.delete');
