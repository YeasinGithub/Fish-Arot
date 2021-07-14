<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[App\Http\Controllers\Controller::class,'index']);

Route::get('/mohajon', [App\Http\Controllers\Mohajon\MohajonController::class,'create']);
Route::post('/mohajon/save', 'App\Http\Controllers\Mohajon\MohajonController@store')->name('mohajon.save');
Route::get('/mohajon/show', 'App\Http\Controllers\Mohajon\MohajonController@index')->name('mohajon.show');
Route::get('/mohajon/edit/',[App\Http\Controllers\Mohajon\MohajonController::class,'edit']);
Route::post('/mohajon/update/',[App\Http\Controllers\Mohajon\MohajonController::class,'update']);
Route::get('/mohajon/delete/',[App\Http\Controllers\Mohajon\MohajonController::class,'destroy'])->name('mohajon.delete');

/*---Active inActive--*/
Route::get('/mohajon/inactive', [App\Http\Controllers\InactiveMohajonController::class,'index']);
Route::get('/mohajon/inactive/active/',[App\Http\Controllers\InactiveMohajonController::class,'destroy'])->name('mohajon.inactive.active');

/*--sells---*/
Route::get('/sell', [App\Http\Controllers\Sell\SellController::class,'create']);
Route::post('/sell/save', 'App\Http\Controllers\Sell\SellController@store')->name('sell.save');
Route::get('/sell/show', 'App\Http\Controllers\Sell\SellController@index')->name('sell.show');
Route::get('/sell/edit/',[App\Http\Controllers\Sell\SellController::class,'edit']);
/*Route::get('/sell/edit/{id}','App\Http\Controllers\Sell\SellController@edit')->name('sell.edit');*/
Route::post('/sell/update/',[App\Http\Controllers\Sell\SellController::class,'update']);
/*Route::post('/sell/update/{id}','App\Http\Controllers\Sell\SellController@update')->name('sell.update');*/
Route::get('/sell/delete/',[App\Http\Controllers\Sell\SellController::class,'destroy'])->name('sell.delete');

Route::get('/sell/customer_address/', [App\Http\Controllers\Sell\SellController::class,'address']);
Route::get('/sell/paikars_address/', [App\Http\Controllers\Sell\SellController::class,'Maddress']);

/*--Nagad sells---*/
Route::get('/nagad', [App\Http\Controllers\NagadSell\NagadSellController::class,'create']);
Route::post('/add', 'App\Http\Controllers\NagadSell\NagadSellController@store')->name('add');
Route::get('/nagad', 'App\Http\Controllers\NagadSell\NagadSellController@index')->name('nagad');
Route::get('/nagad/edit/',[App\Http\Controllers\NagadSell\NagadSellController::class,'edit']);
Route::post('/nagad/update/',[App\Http\Controllers\NagadSell\NagadSellController::class,'update']);
Route::get('/nagad/delete/',[App\Http\Controllers\NagadSell\NagadSellController::class,'destroy'])->name('nagad.delete');

Route::get('/nagad/mohajon_address/', [App\Http\Controllers\NagadSell\NagadSellController::class,'address']);
Route::get('/nagad/paikar_address/', [App\Http\Controllers\NagadSell\NagadSellController::class,'Maddress']);



/*--sells report---*/
Route::get('/report/sell', [App\Http\Controllers\Sell\SellReportController::class,'create']);
Route::post('/report/sell/save', 'App\Http\Controllers\Sell\SellReportController@store')->name('report.sell.save');
Route::get('/report/sell/show', 'App\Http\Controllers\Sell\SellReportController@index')->name('report.sell.show');
Route::get('/report/sell/edit/',[App\Http\Controllers\Sell\SellReportController::class,'edit']);
Route::post('/report/sell/update/',[App\Http\Controllers\Sell\SellReportController::class,'update']);
Route::get('/report/sell/delete/',[App\Http\Controllers\Sell\SellReportController::class,'destroy'])->name('sell.delete');
Route::get('/report/sell/customer_address/', [App\Http\Controllers\Sell\SellReportController::class,'address']);
Route::get('/report/sell/paikars_address/', [App\Http\Controllers\Sell\SellReportController::class,'Maddress']);

/*--sells Bowser---*/
Route::get('/bowser/sell', [App\Http\Controllers\Sell\SellBowserController::class,'create']);
Route::post('/bowser/sell/save', 'App\Http\Controllers\Sell\SellBowserController@store')->name('bowser.sell.save');
Route::get('/bowser/sell/show/{id}', 'App\Http\Controllers\Sell\SellBowserController@show')->name('bowser.sell.show');
/*----paikar------*/
Route::get('/paikar', [App\Http\Controllers\Paikar\PaikarController::class,'create']);
Route::post('/paikar/save', 'App\Http\Controllers\Paikar\PaikarController@store')->name('paikar.save');
Route::get('/paikar/show', 'App\Http\Controllers\Paikar\PaikarController@index')->name('paikar.show');
Route::get('/paikar/edit/',[App\Http\Controllers\Paikar\PaikarController::class,'edit']);
Route::post('/paikar/update/',[App\Http\Controllers\Paikar\PaikarController::class,'update']);
Route::get('/paikar/delete/',[App\Http\Controllers\Paikar\PaikarController::class,'destroy'])->name('paikar.delete');

Route::get('/paikar/inactive', [App\Http\Controllers\InactivePaikarController::class,'index']);
Route::get('/paikar/active/',[App\Http\Controllers\InactivePaikarController::class,'destroy'])->name('paikar.inactive.active');


/*---Dues----*/
Route::get('/due', [App\Http\Controllers\Due\DueController::class,'create']);
Route::post('/due/save', 'App\Http\Controllers\Due\DueController@store')->name('due.save');
Route::get('/due/show', 'App\Http\Controllers\Due\DueController@index')->name('due.show');
Route::get('/due/edit/',[App\Http\Controllers\Due\DueController::class,'edit']);
Route::post('/due/update/',[App\Http\Controllers\Due\DueController::class,'update']);
Route::get('/due/delete/',[App\Http\Controllers\Due\DueController::class,'destroy'])->name('due.delete');
Route::get('/due/paikars_address/', [App\Http\Controllers\Due\DueController::class,'address']);
Route::get('/due/hal/', [App\Http\Controllers\Due\DueController::class,'hal']);

/*---Dues----*/
Route::get('/dadon', [App\Http\Controllers\Dadon\DadonController::class,'create']);
Route::post('/dadon/save', 'App\Http\Controllers\Dadon\DadonController@store')->name('dadon.save');
Route::get('/dadon/show', 'App\Http\Controllers\Dadon\DadonController@index')->name('dadon.show');
Route::get('/dadon/edit/',[App\Http\Controllers\Dadon\DadonController::class,'edit']);
Route::post('/dadon/update/',[App\Http\Controllers\Dadon\DadonController::class,'update']);
Route::get('/dadon/delete/',[App\Http\Controllers\Dadon\DadonController::class,'destroy'])->name('dadon.delete');

/*---জমা খরচ----*/
Route::get('/deposit', [App\Http\Controllers\CreditDebit\CreditDebitController::class,'index']);
Route::post('/deposit/save', 'App\Http\Controllers\CreditDebit\CreditDebitController@store')->name('deposit.save');
Route::get('/deposit/show', 'App\Http\Controllers\CreditDebit\CreditDebitController@index')->name('deposit.show');
Route::get('/deposit/edit/',[App\Http\Controllers\CreditDebit\CreditDebitController::class,'edit']);
Route::post('/deposit/update/',[App\Http\Controllers\CreditDebit\CreditDebitController::class,'update']);
Route::get('/deposit/delete/',[App\Http\Controllers\CreditDebit\CreditDebitController::class,'destroy'])->name('deposit.delete');

/*---ক্যাশ----*/
Route::get('/cash', [App\Http\Controllers\TotalCash\TotalCashController::class,'create']);
Route::post('/cash/save', 'App\Http\Controllers\TotalCash\TotalCashController@store')->name('cash.save');
Route::get('/cash/show', 'App\Http\Controllers\TotalCash\TotalCashController@index')->name('cash.show');
Route::get('/cash/edit/',[App\Http\Controllers\TotalCash\TotalCashController::class,'edit']);
Route::post('/cash/update/',[App\Http\Controllers\TotalCash\TotalCashController::class,'update']);
Route::get('/cash/delete/',[App\Http\Controllers\TotalCash\TotalCashController::class,'destroy'])->name('cash.delete');

/*---Loan Given----*/
Route::get('/loan/', [App\Http\Controllers\LoanGiven\LoanGivenController::class,'index']);
Route::post('/add-loan',[App\Http\Controllers\LoanGiven\LoanGivenController::class,'store'])->name('add-loan');
Route::get('/loan/amount/', [App\Http\Controllers\LoanGiven\LoanGivenController::class,'amount']);
Route::delete('/loan/{id}',[App\Http\Controllers\LoanGiven\LoanGivenController::class,'destroy']);



Route::get('/loan/{id}', [App\Http\Controllers\LoanGiven\LoanGivenController::class,'edit']);
Route::put('/loan/update/',[App\Http\Controllers\LoanGiven\LoanGivenController::class,'update'])->name('loan.update');
/*Route::post('/loan/update/',[App\Http\Controllers\LoanGiven\LoanGivenController::class,'update']);*/
Route::get('/loanE/edit-amount/', [App\Http\Controllers\LoanGiven\LoanGivenController::class,'editamount']);


/*---Loan Taken----*/
Route::get('/loans/', [App\Http\Controllers\LoanTaken\LoanTakenController::class,'index']);
Route::post('/adds-loans',[App\Http\Controllers\LoanTaken\LoanTakenController::class,'store'])->name('adds-loans');

Route::get('/loans/amount/', [App\Http\Controllers\LoanTaken\LoanTakenController::class,'amount']);


/*---চালান----*/
Route::get('/chalan/', [App\Http\Controllers\Chalan\ChalanController::class,'index']);
Route::get('/chalan/mohajons_address/', [App\Http\Controllers\Chalan\ChalanController::class,'address']);
Route::post('chalan/add-chalan/', [App\Http\Controllers\Chalan\ChalanController::class,'store'])->name('chalan.add-chalan');
Route::get('/chalan/edit/', [App\Http\Controllers\Chalan\ChalanController::class,'edit']);
Route::post('/chalan/update/', [App\Http\Controllers\Chalan\ChalanController::class,'update']);
Route::delete('/chalan/{id}', [App\Http\Controllers\Chalan\ChalanController::class,'destroy']);


/*---চালান বাদ----*/
Route::get('/chalan-bad/', [App\Http\Controllers\ChalanBad\ChalanBadController::class,'index']);
Route::post('chalan-bad/save/', [App\Http\Controllers\ChalanBad\ChalanBadController::class,'store'])->name('chalan-bad.save');
Route::get('/chalan-bad/{id}', [App\Http\Controllers\ChalanBad\ChalanBadController::class,'edit']);
Route::put('/chalan-bad/update/', [App\Http\Controllers\ChalanBad\ChalanBadController::class,'update'])->name('chalan-bad.update');
Route::delete('/chalan-bad/{id}', [App\Http\Controllers\ChalanBad\ChalanBadController::class,'destroy']);


Route::get('/chalan-bowser', [App\Http\Controllers\ChalanBowserController::class,'index']);

