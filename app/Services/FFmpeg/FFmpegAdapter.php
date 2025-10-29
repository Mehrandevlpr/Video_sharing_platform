<?php

namespace App\Services\FFmpeg;

use \FFMpeg\FFMpeg;
use \FFMpeg\FFProbe;
use Illuminate\Support\Facades\Storage;

class FFmpegAdapter
{

    protected $ffmpegProbe;
    protected $ffmpegOriginalPath;
    protected $ffmpeg;
    protected $video_probe;

    public function __construct(public string $ffmpegPath)
    {

        $this->ffmpegOriginalPath = $ffmpegPath;
        $this->ffmpeg = FFMpeg::create();
        $this->ffmpegProbe = FFProbe::create([
            'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
            'ffprobe.binaries' => '/usr/bin/ffprobe',
        ]);

        $this->video_probe = $this->ffmpegProbe->format(Storage::path($ffmpegPath));
    }
    public function convertToMp4($inputFile, $outputFile)
    {
        // FFmpeg command to convert video to MP4
        $command = "ffmpeg -i {$inputFile} -c:v libx264 -preset fast -crf 22 -c:a aac -b:a 192k {$outputFile}";
        exec($command, $output, $returnVar);
        return $returnVar === 0;
    }

    public function getFrameImage($time = 1) : string
    {
        $video = $this->ffmpeg->open(Storage::path($this->ffmpegOriginalPath));
        $outputFile =  pathinfo($this->ffmpegOriginalPath, PATHINFO_FILENAME) . '_frame.jpg';
        $storage_path = storage_path('app/public/'.$outputFile);
        $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds($time))->save($storage_path);

        return $outputFile;
    }

    public function getDuration(): int
    {
        return (int) $this->video_probe->get('duration');
    }

    public function setFrameFileType($inputFile, $outputFile, $format)
    {
        $video = $this->ffmpeg->open(Storage::path($inputFile));
        $video->save(new \FFMpeg\Format\Video\X264(), Storage::path($outputFile));
    }
}
