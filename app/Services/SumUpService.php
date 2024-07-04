<?php


namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SumUpService
{
    protected $client;
    protected $accessToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = env('SUMUP_ACCESS_TOKEN');
    }

    public function createPayment($amount, $currency, $description, $callbackUrl)
    {
        $url = 'https://api.sumup.com/v0.1/checkouts';

        $body = [
            'amount' => $amount,
            'currency' => $currency,
            'description' => $description,
            'checkout_reference' => uniqid(),
            'merchant_code' => env('SUMUP_MERCHANT_CODE'),
            'return_url' => $callbackUrl,
        ];

        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => $body,
                'verify' => false,  // Désactiver la vérification SSL pour le développement
            ]);

            $responseBody = json_decode((string) $response->getBody(), true);

            Log::debug('Payment response', ['response' => $responseBody]);

            return $responseBody;
        } catch (\Exception $e) {
            Log::error('Payment processing failed', ['error' => $e->getMessage()]);
            return ['error' => $e->getMessage()];
        }
    }
}


