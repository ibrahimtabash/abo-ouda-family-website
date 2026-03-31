<?php

use App\Http\Controllers\BusinessesController;
use App\Http\Controllers\FamilyCouncilController;
use App\Http\Controllers\FamilyHistoryController;
use App\Http\Controllers\FamilyTreeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfessionalsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');
// Route::get('news', [NewsController::class, 'index'])->name('news.index');
// Route::get('family-tree', [FamilyTreeController::class, 'index']);
// Route::get('family-history', [FamilyHistoryController::class, 'index']);
// Route::get('family-council', [FamilyCouncilController::class, 'index']);
// Route::get('professionals-directory', [ProfessionalsController::class, 'index']);
// Route::get('businesses', [BusinessesController::class, 'index']);
// Route::get('gallery', [GalleryController::class, 'index']);

Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('family-tree', [FamilyTreeController::class, 'index'])->name('family-tree.index');
Route::get('family-history', [FamilyHistoryController::class, 'index'])->name('family-history.index');
Route::get('family-council', [FamilyCouncilController::class, 'index'])->name('family-council.index');
Route::get('professionals-directory', [ProfessionalsController::class, 'index'])->name('professionals.index');
Route::get('businesses', [BusinessesController::class, 'index'])->name('businesses.index');
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');