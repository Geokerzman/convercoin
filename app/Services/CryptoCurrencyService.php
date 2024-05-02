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

    public function getPrice($symbol)
    {
        try {
            $response = $this->client->request('GET', "/v1/exchangerate/{$symbol}/USD", [
                'headers' => ['X-CoinAPI-Key' => $this->apiKey]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } catch (\Exception $e) {
            // Handle error appropriately
            return ['error' => $e->getMessage()];
        }
    }
}