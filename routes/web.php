<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crypto/{symbol}', 'App\Http\Controllers\CryptoCurrencyController@show');
Route::get('/convert/{fromCurrency}/{toCurrency}/{amount}', 'CryptoCurrencyController@convert');
