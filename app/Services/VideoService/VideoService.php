<?php

namespace App\Services\VideoService;

use App\Models\User;
use App\Models\Video;
use App\Services\FFmpeg\FFmpegAdapter;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class VideoService
{

    private function handleFileUpload($data)
    {
        $path = Storage::putFile('', $data['file']);
        $ffmpegService = new FFmpegAdapter($path);
        $data['path'] = $path;
        $data['length'] = $ffmpegService->getDuration();
        $data['thumbnail'] = $ffmpegService->getFrameImage();
    }
    
    public function create(User $user, array $data)
    {
        $data = $this->handleFileUpload($data);
        return $user->videos()->create();
    }

    public function update(Video $video, array $data)
    {
        if ($data['file'] instanceof File) {
            $data = $this->handleFileUpload($data);
        }
        return $video->update($data);
    }
}
