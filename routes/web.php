<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\CriteriaController;

Route::get('/', function () {
    return view('pages.user.index');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Weight
// Route::resource('weight', App\Http\Controllers\WeightController::class);

Route::get('/weight', [App\Http\Controllers\WeightController::class, 'index'])->name('weight')->middleware('auth');
Route::get('/weight/{id}', [App\Http\Controllers\WeightController::class, 'show']);
Route::post('/weight/store', [App\Http\Controllers\WeightController::class, 'store'])->name('weight.store')->middleware('auth');
Route::put('/weight/{id}', [App\Http\Controllers\WeightController::class, 'update'])->name('weight.update');
Route::delete('/weight/{id}', [App\Http\Controllers\WeightController::class, 'destroy'])->name('weight.delete');

Route::get('/weight/edit/{id}', [App\Http\Controllers\WeightController::class, 'edit'])->name('weight.edit');


// Criteria
// Route untuk menampilkan daftar kriteria
Route::get('/criteria', [CriteriaController::class, 'index'])->name('criteria')->middleware('auth');
// Route untuk menampilkan detail kriteria berdasarkan ID
Route::get('/criteria/{id}', [CriteriaController::class, 'show'])->middleware('auth');
// Route untuk menyimpan data kriteria baru
Route::post('/criteria/store', [CriteriaController::class, 'store'])->name('criteria.store')->middleware('auth');
// Route untuk memperbarui data kriteria berdasarkan ID
Route::put('/criteria/update/{id}', [CriteriaController::class, 'update'])->name('criteria.update');
// Route untuk menghapus data kriteria berdasarkan ID
Route::delete('/criteria/{id}', [CriteriaController::class, 'destroy'])->name('criteria.delete');

// Alternative
Route::get('/alternative', [App\Http\Controllers\AlternativeController::class, 'index'])->name('alternative')->middleware('auth');
Route::get('/alternative/{id}', [App\Http\Controllers\AlternativeController::class, 'show']);
Route::post('/alternative/store', [App\Http\Controllers\AlternativeController::class, 'store'])->name('alternative.store')->middleware('auth');
Route::put('/alternative/update/{id}', [App\Http\Controllers\AlternativeController::class, 'update'])->name('alternative.update');
Route::delete('/alternative/{id}', [App\Http\Controllers\AlternativeController::class, 'destroy'])->name('alternative.delete');

Route::get('/alternative/edit/{id}', [App\Http\Controllers\AlternativeController::class, 'edit'])->name('alternative.edit');


// Calculation
Route::get('/calculation', [CalculationController::class, 'index'])->name('calculation')->middleware('auth');
Route::get('/calculation/{id}', [App\Http\Controllers\CalculationController::class, 'show']);
Route::post('/calculation/store', [App\Http\Controllers\CalculationController::class, 'store'])->name('calculation.store')->middleware('auth');
Route::put('/calculation/update/{id}', [App\Http\Controllers\CalculationController::class, 'update'])->name('calculation.edit');
Route::delete('/calculation/{id}', [App\Http\Controllers\CalculationController::class, 'destroy'])->name('calculation.delete');

// Evaluation
Route::get('/evaluation', [App\Http\Controllers\EvaluationController::class, 'index'])->name('evaluation')->middleware('auth');
Route::get('/evaluation/{id}', [App\Http\Controllers\EvaluationController::class, 'show']);
Route::post('/evaluation/store', [App\Http\Controllers\EvaluationController::class, 'store'])->name('evaluation.store')->middleware('auth');
Route::put('/evaluation/update/{id}', [App\Http\Controllers\EvaluationController::class, 'update'])->name('evaluation.edit');
Route::delete('/evaluation/{id}', [App\Http\Controllers\EvaluationController::class, 'destroy'])->name('evaluation.delete');

// Category
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category')->middleware('auth');
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store')->middleware('auth');
Route::put('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.edit');
Route::delete('/category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');
