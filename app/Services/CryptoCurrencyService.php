<?php

namespace App\Services;

use GuzzleHttp\Client;

class CryptoCurrencyService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.coinapi.base_url'),
        ]);
        $this->apiKey = config('services.coinapi.key');
    }

    public function convertCurrency($fromSymbol, $toSymbol, $amount)
    {
        try {
            // Getting the currency exchange rate
            $response = $this->client->request('GET', "/v1/exchangerate/{$fromSymbol}/{$toSymbol}", [
                'headers' => ['X-CoinAPI-Key' => $this->apiKey]
            ]);
    
            $data = json_decode($response->getBody()->getContents(), true);
    
            if (!isset($data['rate'])) {
                return ['error' => 'Exchange rate not found'];
            }
    
            $rate = $data['rate'];
            $convertedAmount = $rate * $amount;
    
            return [
                'fromSymbol' => $fromSymbol,
                'toSymbol' => $toSymbol,
                'originalAmount' => $amount,
                'convertedAmount' => $convertedAmount,
                'rate' => $rate
            ];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    
    
}