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
});
Route::get('news', [NewsController::class, 'index']);
Route::get('family-tree', [FamilyTreeController::class, 'index']);
Route::get('family-history', [FamilyHistoryController::class, 'index']);
Route::get('family-council', [FamilyCouncilController::class, 'index']);
Route::get('professionals-directory', [ProfessionalsController::class, 'index']);
Route::get('businesses', [BusinessesController::class, 'index']);
Route::get('gallery', [GalleryController::class, 'index']);