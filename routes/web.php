<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'pages.index')->name('index');
Route::view('/about-us', 'pages.about')->name('about');
Route::view('/faqs', 'pages.faqs')->name('faqs');

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('deposit', [DepositController::class, 'deposit'])->name('deposit');
    Route::get('deposit/{id}/payment', [DepositController::class, 'payment'])->name('payment');
    Route::post('process/deposit', [DepositController::class, 'processDeposit'])->name('processDeposit');
    Route::patch('process/payment', [DepositController::class, 'processPayment'])->name('processPayment');

    Route::get('investment/plan', [InvestmentController::class, 'plans'])->name('plans');
    Route::post('invest/plan', [InvestmentController::class, 'processInvest'])->name('processInvest');
    Route::get('investment/details/{id}', [InvestmentController::class, 'investmentDetails'])->name('investmentDetails');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


include 'admin.php';

