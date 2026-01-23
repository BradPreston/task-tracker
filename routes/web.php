<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';

// Task Statuses
Route::get('status', [TaskStatusController::class, 'index'])->middleware(['auth', 'verified'])->name('status.index');
Route::get('status/create', [TaskStatusController::class, 'create'])->middleware(['auth', 'verified'])->name('status.create');
Route::get('status/{taskStatus}', [TaskStatusController::class, 'show'])->middleware(['auth', 'verified'])->name('status.show');
Route::post('status', [TaskStatusController::class, 'store'])->middleware(['auth', 'verified'])->name('status.store');
Route::get('status/{taskStatus}/edit', [TaskStatusController::class, 'edit'])->middleware(['auth', 'verified'])->name('status.edit');
Route::put('status/{taskStatus}', [TaskStatusController::class, 'update'])->middleware(['auth', 'verified'])->name('status.update');
Route::delete('status/{taskStatus}', [TaskStatusController::class, 'destroy'])->middleware(['auth', 'verified'])->name('status.destroy');

// Companies
Route::get('companies', [CompanyController::class, 'index'])->middleware(['auth', 'verified'])->name('companies.index');
Route::get('companies/create', [CompanyController::class, 'create'])->middleware(['auth', 'verified'])->name('companies.create');
Route::post('companies', [CompanyController::class, 'store'])->middleware(['auth', 'verified'])->name('companies.store');
Route::get('companies/{company}', [CompanyController::class, 'show'])->middleware(['auth', 'verified'])->name('companies.show');
Route::get('companies/{company}/edit', [CompanyController::class, 'edit'])->middleware(['auth', 'verified'])->name('companies.edit');
Route::put('companies/{company}', [CompanyController::class, 'update'])->middleware(['auth', 'verified'])->name('companies.update');
Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->middleware(['auth', 'verified'])->name('companies.destroy');
