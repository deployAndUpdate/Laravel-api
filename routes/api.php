<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/test', function () {
    return response()->json(['message' => 'Hello, this is a test route!']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');  // Получить всех пользователей
    Route::get('/{id}', [UserController::class, 'show'])->name('show');  // Получить конкретного пользователя
    Route::post('/', [UserController::class, 'store'])->name('store');  // Создать пользователя
    Route::put('/{id}', [UserController::class, 'update'])->name('update');  // Обновить пользователя
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');  // Удалить пользователя
});
