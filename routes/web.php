<?php

use App\Http\Controllers\BusinessesController;
use App\Http\Controllers\FamilyCouncilController;
use App\Http\Controllers\FamilyHistoryController;
use App\Http\Controllers\FamilyTreeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfessionalRequestController;
use App\Http\Controllers\ProfessionalsController;
use App\Http\Controllers\ProfileController;
use App\Models\News;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', HomePageController::class)->name('home');


Route::middleware('auth')->group(function() {

    Route::middleware('role:admin,editor,member')->group(function () {
        // Routes accessible to all roles
        Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('news', [NewsController::class, 'store'])->name('news.store');
    });

    Route::middleware('role:admin,editor')->group(function () {
        Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');
    });

    Route::middleware('role:admin')->group(function () {
        Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    });
});

Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('news/{id}', [NewsController::class, 'show'])->name('news.show');


Route::get('professionals-directory', [ProfessionalsController::class, 'index'])->name('professionals.index');
Route::get('professionals-directory/{id}', [ProfessionalsController::class, 'show'])->name('professionals.show');
Route::post('professionals-directory', [ProfessionalsController::class, 'store'])->name('professionals.store');
Route::get('professionals-directory/{id}/edit', [ProfessionalsController::class, 'edit'])->name('professionals.edit');
Route::put('professionals-directory/{id}', [ProfessionalsController::class, 'update'])->name('professionals.update');
Route::delete('professionals-directory/{id}', [ProfessionalsController::class, 'destroy'])->name('professionals.destroy');



Route::get('professional-request/create', [ProfessionalsController::class, 'create'])->name('professional.request.store');
Route::post('/professional-request', [ProfessionalRequestController::class, 'store'])
    ->name('professional.request.store')
    ->middleware('auth');

Route::get('family-tree', [FamilyTreeController::class, 'index'])->name('family-tree.index');
Route::get('family-history', [FamilyHistoryController::class, 'index'])->name('family-history.index');
Route::get('family-council', [FamilyCouncilController::class, 'index'])->name('family-council.index');
Route::get('businesses', [BusinessesController::class, 'index'])->name('businesses.index');
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';