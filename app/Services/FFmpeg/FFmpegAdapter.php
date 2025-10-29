<?php

namespace App\Services\FFmpeg;

use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use Illuminate\Support\Facades\Storage;

class FFmpegAdapter
{

    private $ffmpegProbe;
    private $video_probe;

    public function __construct(string $ffmpegPath)
    {
         $this->ffmpegProbe = FFProbe::create();
         $this->video_probe = $this->ffmpegProbe->format(Storage::path($ffmpegPath));
    }
    public function convertToMp4($inputFile, $outputFile)
    {
        // FFmpeg command to convert video to MP4
        $command = "ffmpeg -i {$inputFile} -c:v libx264 -preset fast -crf 22 -c:a aac -b:a 192k {$outputFile}";
        exec($command, $output, $returnVar);
        return $returnVar === 0;
    }

    public function getFrameImage($inputFile, $time, $outputFile)
    {
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open(Storage::path($inputFile));
        $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds($time))
              ->save(Storage::path($outputFile));
    }

    public function getDuration(): int
    {
        return (int) $this->video_probe->get('duration');
    }

    public function setFrameFileType($inputFile, $outputFile, $format)
    {
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open(Storage::path($inputFile));
        $video->save(new \FFMpeg\Format\Video\X264(), Storage::path($outputFile));
    }
}