<?php

use Illuminate\Support\Facades\Route;
use App\Services\UserService;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',  function () {
    return view('users.index');
});

Route::prefix('users')->group(function () {
    Route::get('/', function (UserService $userService) {
        $users = $userService->getAllUsers(); // Получаем данные через сервис
        return view('users.index', compact('users')); // Передаем данные в вьюшку
    })->name('users.index');

    Route::delete('/destroy', function ($id, UserService $userService) {
        $users = $userService->destroy($id); // Получаем данные через сервис
        return view('users.index', compact('users')); // Передаем данные в вьюшку
    })->name('users.index');

    Route::get('/create', function () {
        return view('users.create'); // Возвращаем форму создания пользователя
    })->name('users.create');

    Route::put('/{id}/edit', function ($id, UserService $userService) {
        $user = $userService->getUserById($id); // Получаем данные пользователя через сервис
        return view('users.edit', compact('user')); // Передаем данные в вьюшку
    })->name('users.edit');


});



