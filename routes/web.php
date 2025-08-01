<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\PackageCategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\WhyChooseUsController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard Route
Route::middleware(['auth'])->get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Admin Panel Resource Routes (CRUD)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('banners', BannerController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('contacts', ContactInfoController::class);
});

// Package Categories Routes with Soft Delete
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('package-categories', PackageCategoryController::class);

    // Soft delete management
    Route::get('package-categories/trashed', [PackageCategoryController::class, 'trashed'])->name('package-categories.trashed');
    Route::get('package-categories/restore/{id}', [PackageCategoryController::class, 'restore'])->name('package-categories.restore');
    Route::delete('package-categories/force-delete/{id}', [PackageCategoryController::class, 'forceDelete'])->name('package-categories.forceDelete');
});

// Packages CRUD
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('packages', PackageController::class);
});

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/about', [AboutSectionController::class, 'index'])->name('about.index');
    Route::get('/about/create', [AboutSectionController::class, 'create'])->name('about.create');
    Route::post('/about/store', [AboutSectionController::class, 'store'])->name('about.store');
    Route::get('/about/edit', [AboutSectionController::class, 'edit'])->name('about.edit');
    Route::post('/about/update', [AboutSectionController::class, 'update'])->name('about.update');
    Route::post('/about/destroy', [AboutSectionController::class, 'destroy'])->name('about.destroy');
    Route::post('/about/restore', [AboutSectionController::class, 'restore'])->name('about.restore');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('why-choose-us', [WhyChooseUsController::class, 'index'])->name('why.index');
    Route::get('why-choose-us/create', [WhyChooseUsController::class, 'create'])->name('why.create');
    Route::post('why-choose-us/store', [WhyChooseUsController::class, 'store'])->name('why.store');
    Route::get('why-choose-us/edit/{id}', [WhyChooseUsController::class, 'edit'])->name('why.edit');
    Route::post('why-choose-us/update/{id}', [WhyChooseUsController::class, 'update'])->name('why.update');
    Route::post('why-choose-us/delete/{id}', [WhyChooseUsController::class, 'destroy'])->name('why.destroy');
    Route::post('why-choose-us/restore/{id}', [WhyChooseUsController::class, 'restore'])->name('why.restore');
});

// Auth scaffolding
require __DIR__.'/auth.php';
