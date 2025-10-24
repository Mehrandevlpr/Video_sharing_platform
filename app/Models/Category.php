<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function videos()
    {
      return $this->hasMany(Video::class);
    }

    public function getRandomVideos($count = 6, $video_id)
    {
      return $this->videos()->where('id', '!=', $video_id)->inRandomOrder()->take($count)->get();
    }

}
