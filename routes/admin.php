<?php

use App\Http\Controllers\Backoffice\FamilyMemberController;
use App\Http\Controllers\Backoffice\ProfessionalsController as BackofficeProfessionalsController;
use App\Http\Controllers\ProfessionalRequestController;
use App\Http\Controllers\ProfessionalsController;
use Illuminate\Support\Facades\Route;


Route::get('admin/dashboard', function () {
    return view('backoffice.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('family-members', FamilyMemberController::class);
    // Route::get('news/pending', [\App\Http\Controllers\Backoffice\NewsController::class, 'pending'])->name('backoffice.news.pending');
    Route::get('news', [\App\Http\Controllers\Backoffice\NewsController::class, 'index'])->name('backoffice.news.index');
    Route::get('news/{id}', [\App\Http\Controllers\Backoffice\NewsController::class, 'show'])->name('backoffice.news.show');
    Route::get('news/{id}/edit', [\App\Http\Controllers\Backoffice\NewsController::class, 'edit'])->name('backoffice.news.edit');
    Route::post('news/{id}/publish', [\App\Http\Controllers\Backoffice\NewsController::class, 'publish'])->name('backoffice.news.publish');
    Route::post('news/{id}/reject', [\App\Http\Controllers\Backoffice\NewsController::class, 'reject'])->name('backoffice.news.reject');
    Route::delete('news/{id}', [\App\Http\Controllers\Backoffice\NewsController::class, 'destroy'])->name('backoffice.news.destroy');


    Route::get('users', [\App\Http\Controllers\Backoffice\UserController::class, 'index'])->name('backoffice.users.index');
    Route::delete('users/{id}', [\App\Http\Controllers\Backoffice\UserController::class, 'destroy'])->name('backoffice.users.destroy');
    Route::get('users/{id}', [\App\Http\Controllers\Backoffice\UserController::class, 'show'])->name('backoffice.users.show');

    Route::get('professionals', [\App\Http\Controllers\Backoffice\ProfessionalsController::class, 'index'])->name('backoffice.professionals.index');
    Route::get('professional-request/index', [ProfessionalRequestController::class, 'index'])->name('professional-request.index');
    Route::post('professional-request/{id}/approve', [ProfessionalRequestController::class, 'approve'])->name('professional-request.approve');


    Route::resource('professions', \App\Http\Controllers\Backoffice\ProfessionController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('professional-request', [ProfessionalRequestController::class, 'index'])->name('professional-request.index');
    Route::post('professional-request/{id}/approve', [ProfessionalRequestController::class, 'approve'])->name('professional-request.approve');
    Route::post('professional-request/{id}/reject', [ProfessionalRequestController::class, 'reject'])->name('professional-request.reject');
});
