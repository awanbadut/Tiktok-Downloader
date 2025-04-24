<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TikTokDownloadController extends Controller
{
    public function download(Request $request)
    {
        $url = $request->query('url');
        $type = $request->query('type', 'nowm'); // default: no watermark

        if (!$url) {
            return back()->with('error', 'No URL provided.');
        }

        $filename = 'tiktok_' . now()->timestamp . '_' . $type . '.mp4';

        return new StreamedResponse(function () use ($url) {
            $stream = fopen($url, 'r');
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Content-Type' => 'video/mp4',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}

