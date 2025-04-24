<?php
namespace App\Services;

use GuzzleHttp\Client;

class WilayahService
{
    protected $client;
    protected $baseUrl = "https://emsifa.github.io/api-wilayah-indonesia/api";

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getProvinces()
    {
        $response = $this->client->get("{$this->baseUrl}/provinces.json");
        return json_decode($response->getBody(), true);
    }

    public function getRegencies($provinceId)
    {
        $response = $this->client->get("{$this->baseUrl}/regencies/{$provinceId}.json");
        return json_decode($response->getBody(), true);
    }
}
