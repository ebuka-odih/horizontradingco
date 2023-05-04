<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index')->name('index');
Route::view('/about-us', 'pages.about')->name('about');
Route::view('/faqs', 'pages.faqs')->name('faqs');
Route::view('/demo', 'welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

include'admin.php';

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', "UserController@dashboard")->name('dashboard');
    Route::get('referrals', "UserController@all_referrals")->name('all_referrals');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::patch('update/profile', 'UserController@updateProfile')->name('updateProfile');
    Route::get('security', 'UserController@security')->name('security');
    Route::post('update/security', "UserController@updateSecurity")->name('updateSecurity');
    Route::get('account', 'WithdrawMethodController@create')->name('account');
    Route::post('account', 'WithdrawMethodController@store')->name('account.store');

    Route::get('deposit/transactions', "DepositController@transactions")->name('transactions');
    Route::get('pending/transactions', "DepositController@pendingTransactions")->name('pendingTransactions');
    Route::get('deposit', "DepositController@deposit")->name('deposit');
    Route::post('process/deposit', "DepositController@processDeposit")->name('processDeposit');
    Route::get('deposit/payment/QH5H3Q64{id}2GER', "DepositController@payment")->name('payment');
    Route::post('process/payment/QH5H3Q642GER', "DepositController@processPayment")->name('processPayment');
    Route::get('cancelled/deposit/XCRTRD{id}ERTX8F&', "DepositController@cancelDeposit")->name('cancelDeposit');

    //Withdrawal Routes
    Route::get('withdraw/transactions', "WithdrawController@transactions")->name('withdraw.transactions');
    Route::get('withdraw', "WithdrawController@withdraw")->name('withdraw');
    Route::post('withdraw', "WithdrawController@processWithdraw")->name('processWithdraw');
    Route::get('withdraw/success/RETWYR432{id}3TYW5T', "WithdrawController@success")->name('success');
    Route::get('cancelled/withdrawal/XCRTRD{id}ERTX8F&', "WithdrawController@cancelWithdraw")->name('cancelWithdraw');

    Route::get('investments', 'InvestmentController@investments')->name('investments');
    Route::get('invest/plans', 'InvestmentController@plans')->name('plans');
    Route::get('invest', 'InvestmentController@invest')->name('invest');
    Route::post('process/investment', 'InvestmentController@processInvest')->name('processInvest');
    Route::get('investment/details/DFRY64521{id}3FFAG', 'InvestmentController@investmentDetails')->name('investmentDetails');


});
