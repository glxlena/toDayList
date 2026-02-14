<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});
// Rotas de autenticação
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rota protegida para a home, gráficos e perfil
Route::get('/home', function () {return view('tasks/home');
    })->middleware('auth')->name('home');

Route::get('/graphics', function () {return view('graphics');
})->middleware('auth')->name('graphics');

Route::get('/profile', function () {return view('profile/profile');
})->middleware('auth')->name('profile');