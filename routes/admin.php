<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDepositController;
use App\Http\Controllers\Admin\AdminPaymentWalletController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::get('user/details/{id}', [UserController::class, 'viewUser'])->name('viewUser');
    Route::get('verify/user/{id}', [UserController::class, 'verifyUser'])->name('verifyUser');
    Route::get('delete/user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::resource('payment-wallet', AdminPaymentWalletController::class);

    Route::get('transactions/deposits', [AdminDepositController::class, 'deposits'])->name('deposits');
    Route::post('store/deposit', [AdminDepositController::class, 'storeDeposit'])->name('storeDeposit');
    Route::get('deposit/details', [AdminDepositController::class, 'depositDetails'])->name('deposit.details');
    Route::get('approve/deposit/{id}', [AdminDepositController::class, 'approveDeposit'])->name('approveDeposit');
    Route::delete('delete/deposit/{id}', [AdminDepositController::class, 'deleteDeposit'])->name('deleteDeposit');




});
