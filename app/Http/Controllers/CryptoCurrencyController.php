<?php

namespace App\Http\Controllers;

use App\Services\CryptoCurrencyService;

class CryptoCurrencyController extends Controller
{
    protected $cryptoService;

    public function __construct(CryptoCurrencyService $cryptoService)
    {
        $this->cryptoService = $cryptoService;
    }

    public function show($symbol)
    {
        $price = $this->cryptoService->getPrice($symbol);

        return response()->json($price);
    }
}
