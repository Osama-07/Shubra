<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::middleware(['auth:api'])->group(function () {
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::post("/refresh", [AuthController::class, "refresh"]);
    Route::get("/me", [AuthController::class, "me"]);
});

Route::get("/users", function () {
    return response()->json([
        'status' => 'success',
        'users' => User::all(),
    ], 200);
})->middleware(['auth:api', 'role:admin']);


Route::middleware(['auth:api'])->group(function () {
    Route::post("/articles", [ArticleController::class, "store"])->middleware(['role:admin']);
    Route::get("/articles", [ArticleController::class, "index"]);
    Route::get("/articles/{article}", [ArticleController::class, "show"]);
});
