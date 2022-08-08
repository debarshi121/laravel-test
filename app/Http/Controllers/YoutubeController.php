<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class YoutubeController extends Controller
{
    public function download(Request $request)
    {
       $cmd = `cd storage/downloads/ && yt-dlp --extract-audio --audio-format mp3 {$request->videoUrl}`;

        // try {
        //     $process = new Process([
        //         'youtube-dl',
        //         'https://www.youtube.com/watch?v=BddP6PYo2gs',
        //         '-o',
        //         storage_path('app/public/downloads/%(title)s.%(ext)s')
        //         , '--print-json',
        //     ]);

        //     $process->mustRun();

        //     $output = json_decode($process->getOutput(), true);

        //     if (json_last_error() !== JSON_ERROR_NONE) {
        //         throw new \Exception("Could not download the file!");
        //     }

        //     return $output;

        //     //return response()->download($output['_filename']);

        // } catch (\Throwable $exception) {
        //     logger()->critical($exception->getMessage());
        //     return $exception;
        // }

        try {
            exec($cmd, $output, $return_var);
            return $output;
        } catch (\Throwable $exception) {
            return $exception;
        }
        

    }
}
