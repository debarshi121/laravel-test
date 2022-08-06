<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class YoutubeController extends Controller
{
    public function download()
    {
        // https://www.youtube.com/watch?v=BddP6PYo2gs

        $cmd = 'yt-dlp --extract-audio --audio-format mp3 "https://www.youtube.com/watch?v=BddP6PYo2gs" -P storage';
        $process = new Process([$cmd]);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}
