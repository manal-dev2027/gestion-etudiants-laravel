<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية ولائحة الطلبة متاحة للجميع
Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

Route::get('/students/{id}', [StudentController::class, 'show'])
    ->whereNumber('id')
    ->name('students.show');

// الصفحات التي تتطلب تسجيل الدخول
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// الإضافة والتعديل والحذف للـ Admin فقط
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/students/create', [StudentController::class, 'create'])
        ->name('students.create');

    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');

    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
        ->whereNumber('id')
        ->name('students.edit');

    Route::put('/students/{id}', [StudentController::class, 'update'])
        ->whereNumber('id')
        ->name('students.update');

    Route::delete('/students/{id}', [StudentController::class, 'destroy'])
        ->whereNumber('id')
        ->name('students.destroy');
});

require __DIR__.'/auth.php';
