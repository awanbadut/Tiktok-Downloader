<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\IslamicApiService;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class IslamicApiController extends Controller
{
    protected $apiService;
    protected $client;
    protected $apiKey;

    public function __construct(IslamicApiService $apiService)
    {
        $this->apiService = $apiService;
        $this->client = new Client();
        $this->apiKey = env('TIKTOK_API_KEY');
    }

    // Fungsi untuk menampilkan form dan video TikTok
    public function showForm()
    {
        return view('tiktok-form');
    }

    public function downloadTikTokVideo($videoUrl)
    {
        try {
            $response = $this->client->get('https://tiktok-api23.p.rapidapi.com/api/download/video', [
                'headers' => [
                    'x-rapidapi-host' => 'tiktok-api23.p.rapidapi.com',
                    'x-rapidapi-key' => $this->apiKey,
                ],
                'query' => [
                    'url' => $videoUrl,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            Log::info("TikTok API response: " . json_encode($data));

            return $data;
        } catch (\Exception $e) {
            Log::error("TikTok API error: " . $e->getMessage());
            return ['error' => 'There was an error downloading the video.'];
        }
    }

    // Fungsi untuk menerima URL video dari form dan menampilkan video
    public function showTikTokVideo(Request $request)
    {
        $request->validate([
            'video_url' => 'required|url',
        ]);

        $videoUrl = $request->input('video_url');
        $videoData = $this->apiService->downloadTikTokVideo($videoUrl);

        if (isset($videoData['error'])) {
            return response()->json(['error' => $videoData['error']], 400);
        }

        return view('tiktok-video', [
            'video' => $videoData,
        ]);
    }

}