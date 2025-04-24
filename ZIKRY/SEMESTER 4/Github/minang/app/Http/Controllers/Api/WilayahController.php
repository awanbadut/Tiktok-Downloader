<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WilayahService;

class WilayahController extends Controller
{
    protected $service;

    public function __construct(WilayahService $service)
    {
        $this->service = $service;
    }

    public function getProvinces()
    {
        return response()->json($this->service->getProvinces());
    }

    public function getRegencies($id)
    {
        return response()->json($this->service->getRegencies($id));
    }
}

