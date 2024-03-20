<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\NoLoginMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(NoLoginMiddleware::class)->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name("welcome");
    Route::get("/register", [UserController::class, "getRegister"])->name("register");
    Route::post("/register", [UserController::class, "register"])->name("register");
    Route::get("/login", [UserController::class, "getLogin"])->name("login");
    Route::post("/login", [UserController::class, "login"])->name("login");
});

Route::middleware(LoginMiddleware::class)->group(function(){
    Route::get("/logout", [UserController::class, "logout"])->name("logout");
    Route::get("/dashboard", [UserController::class, "dashboard"])->name("dashboard");
    Route::post("/dashboard", [UserController::class, "submit"])->name("dashboard");
    Route::get("/poin", [UserController::class, "poin"])->name("poin");
    Route::get("/history", [UserController::class, "history"])->name("history");
    Route::post("/history", [UserController::class, "historyEdit"])->name("history");
    Route::get("/edit/quote", [UserController::class, "getEditQuote"])->name("edit-quote");
    Route::post("/edit/quote", [UserController::class, "editQuote"])->name("edit-quote");
});


