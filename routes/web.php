<?php


use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


// Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
// Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
// Route::get('/jobs/{job}', [JobController::class, 'show'])->middleware('auth');
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:update,job']);
// Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware(['auth', 'can:update,job']);
// Route::put('/jobs/{job}', [JobController::class, 'delete'])->middleware(['auth', 'can:delete,job']);



// Acessable Route
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::prefix('jobs')->group(function () {
        Route::get('/create', [JobController::class, 'create']);
        Route::post('/', [JobController::class, 'store']);
        Route::get('/{job}', [JobController::class, 'show'])->name('jobs.show');
        Route::get('/{job}/edit', [JobController::class, 'edit'])->middleware('can:update,job')->name('jobs.edit');
        Route::put('/{job}', [JobController::class, 'update'])->middleware('can:update,job');
        Route::delete('/{job}', [JobController::class, 'delete'])->middleware('can:delete,job')->name('jobs.destroy');
    });

    Route::get('/search', SearchController::class);
    Route::get('/tags/{tag:name}', TagController::class);

});


// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
