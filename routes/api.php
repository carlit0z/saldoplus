<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TwoFactorAuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('users/{userId}')->group(function () {
    Route::get('bank-accounts', [BankAccountController::class, 'index']);
    Route::post('bank-accounts', [BankAccountController::class, 'store']);
});

Route::prefix('bank-accounts/{accountId}')->group(function () {
    Route::get('/', [BankAccountController::class, 'show']);
    Route::put('/', [BankAccountController::class, 'update']);
    Route::delete('/', [BankAccountController::class, 'destroy']);
    
    Route::get('transactions', [TransactionController::class, 'index']);
    Route::post('transactions', [TransactionController::class, 'store']);
});

Route::prefix('transactions/{transactionId}')->group(function () {
    Route::get('/', [TransactionController::class, 'show']);
    Route::put('/', [TransactionController::class, 'update']);
    Route::delete('/', [TransactionController::class, 'destroy']);
});

Route::prefix('users/{userId}/budgets')->group(function () {
    Route::get('/', [BudgetController::class, 'index']);
    Route::post('/', [BudgetController::class, 'store']);
});

Route::prefix('budgets/{budgetId}')->group(function () {
    Route::get('/', [BudgetController::class, 'show']);
    Route::put('/', [BudgetController::class, 'update']);
    Route::delete('/', [BudgetController::class, 'destroy']);
});


