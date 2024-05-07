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

    public function convert($fromCurrency, $toCurrency, $amount)
    {
        try {
            $validatedData = request()->validate([
                'fromCurrency' => 'required|string|size:3',
                'toCurrency' => 'required|string|size:3',
                'amount' => 'required|numeric|min:0.01'
            ]);
    
            $conversionResult = $this->cryptoService->convertCurrency($validatedData['fromCurrency'], $validatedData['toCurrency'], $validatedData['amount']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
        return response()->json($conversionResult);
    }
    
    
}
