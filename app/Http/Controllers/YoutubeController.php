<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class YoutubeController extends Controller
{
    public function download(Request $request)
    {
        ini_set('max_execution_time', '300');

        $uuid = (string) Str::uuid();

        $cmd = "cd storage/downloads && youtube-dl --write-info-json --write-sub --write-thumbnail -o " . $uuid . "/" . $uuid . ".%(ext)s -x --audio-format mp3 " . $request->videoUrl;

        try {
            if (shell_exec($cmd)) {
                Log::info($uuid);
                $data = json_decode(file_get_contents("storage/downloads/".$uuid."/".$uuid.".info.json"), true);
                return $data['fulltitle'];
            }
        } catch (\Throwable $exception) {
            return $exception;
        }
    }
}
