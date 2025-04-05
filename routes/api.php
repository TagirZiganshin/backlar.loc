<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware("auth:sanctum")->group(function(){
    Route::post("/create-comment/{id}", [UserController::class, "createcomment"])->name("createcomment");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
    Route::get("/check-role", [RoleController::class, "checkrole"])->name("checkrole");
    Route::get("/post/{id}", [UserController::class, "post"])->name("post");
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/create-post', [AdminController::class, 'createpost'])->name("createpost");
    Route::post('/create-news', [AdminController::class, 'createnews'])->name("createnews");
    Route::put("/update/{id}", [UserController::class, "update"])->name("update");
});
    Route::get("/new/{id}", [UserController::class, "new"])->name("new");
    Route::get("/posts", [UserController::class, "posts"])->name("posts");
    Route::get("/news", [UserController::class, "news"])->name("news");
    Route::post("/register", [AuthController::class, "register"])->name("register");
    Route::post("/login", [AuthController::class, "login"])->name("login");