<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class YoutubeController extends Controller
{
    public function download(Request $request)
    {
        $cmd = "yt-dlp --extract-audio --audio-format mp3 ".$request->videoUrl;

        return file_get_contents($request->videoUrl);

        try {
            return shell_exec($cmd);
        } catch (\Throwable $exception) {
            return $exception;
        }
        
    }
}
