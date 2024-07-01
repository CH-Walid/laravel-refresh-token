<?php

use App\Enums\TokenAbility;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/me', [AuthController::class, 'me'])
->middleware(['auth:sanctum', 'ability:' . TokenAbility::ACCESS_API->value]);

Route::get('/refresh', [AuthController::class, 'refresh'])
->middleware(['cookie.to.bearer', 'auth:sanctum', 'ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value]);
