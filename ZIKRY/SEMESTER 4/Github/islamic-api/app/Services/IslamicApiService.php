<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class IslamicApiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('RAPIDAPI_KEY');
    }

    // Fungsi untuk download video TikTok
    public function downloadTikTokVideo($videoUrl)
    {
        try {
            $response = $this->client->get('https://tiktok-api23.p.rapidapi.com/api/download/video', [
                'query' => [
                    'url' => $videoUrl,
                ],
                'headers' => [
                    'x-rapidapi-host' => 'tiktok-api23.p.rapidapi.com',
                    'x-rapidapi-key' => $this->apiKey,
                ],
            ]);
    
            $data = json_decode($response->getBody()->getContents(), true);
            Log::info("TikTok video API response: " . json_encode($data)); // Log response data
            return $data;
    
        } catch (\Exception $e) {
            Log::error("API error: " . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }
}
