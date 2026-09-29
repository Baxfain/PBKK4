<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::redirect('/', '/beranda');

Route::get('/beranda', [PageController::class, 'index'])->name('beranda');
Route::get('/profil-mahasiswa', [PageController::class, 'profil'])->name('profil');
Route::get('/ide-agent', [PageController::class, 'ideRiset'])->name('ide.riset');
Route::get('/feedback', [PageController::class, 'feedback'])->name('feedback.form');
Route::post('/feedback', [PageController::class, 'submitFeedback'])->name('feedback.submit');
