<?php

namespace App\Models;

use App\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Video extends Model
{
  use HasFactory, Likeable;
  protected $perPage = 18;

  protected $fillable = ['name', 'slug', 'thumbnail', 'length', 'path', 'description', 'category_id', 'user_id'];


  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function getDescriptionValueAttribute()
  {
    return Str::limit($this->description, 40) . '...';
  }
  public function getVideoThumbnailAttribute()
  {
    return  './storage/' . $this->thumbnail;
  }

  public function getCreatedAtAttribute($created_at)
  {
    return (new Verta($created_at))->formatDifference();
  }


  public function getLengthInHumanAttribute()
  {
    return gmdate('i:s', $this->length) . ' ثانیه';
  }

  public function relatedVideos(int $count = 8)
  {
    return $this->category->getRandomVideos($count, $this->id);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function getCategoryNameAttribute()
  {
    return $this->category?->name;
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function getOwnerNameAttribute()
  {
    return $this->user?->name;
  }

  public function getOwnerAvatarAttribute()
  {
    return $this->user?->gravatar;
  }

  public function comments()
  {
    return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
  }

  public function getVideoUrlAttribute()
  {
    return '/storage/'.$this->path;
  }
}
