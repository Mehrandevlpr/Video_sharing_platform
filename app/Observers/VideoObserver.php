<?php

namespace App\Observers;

use App\Models\video;
use Illuminate\Support\Facades\Storage;

class VideoObserver
{
    /**
     * Handle the video "created" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function created(video $video)
    {
        //
    }

    /**
     * Handle the video "updated" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function updated(video $video)
    {
        if ($video->wasChanged('path')) {
            Storage::delete($video->getOriginal('path'));
        }
    }

    /**
     * Handle the video "deleted" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function deleted(video $video)
    {
        if($video->trashed()) return true;
        Storage::delete($video->path);
        Storage::delete($video->thumbnail);
    }

    /**
     * Handle the video "restored" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function restored(video $video)
    {
        //
    }

    /**
     * Handle the video "force deleted" event.
     *
     * @param  \App\Models\video  $video
     * @return void
     */
    public function forceDeleted(video $video)
    {
        //
    }
}
