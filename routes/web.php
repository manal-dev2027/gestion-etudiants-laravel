<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// الصفحات المتاحة لجميع المستخدمين المسجلين
Route::middleware('auth')->group(function () {

 Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/{id}', [StudentController::class, 'show'])
    ->whereNumber('id')
    ->name('students.show');
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// العمليات الخاصة بالـ Admin فقط
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/students/create', [StudentController::class, 'create'])
        ->name('students.create');

    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
    ->whereNumber('id')
    ->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])
        ->name('students.update');

    Route::delete('/students/{id}', [StudentController::class, 'destroy'])
        ->name('students.destroy');
});

require __DIR__.'/auth.php';
