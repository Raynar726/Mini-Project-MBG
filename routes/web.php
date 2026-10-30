<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/laporan/buat', [ReportController::class, 'create'])->name('reports.create');
Route::post('/laporan', [ReportController::class, 'store'])->name('reports.store');