<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Str;


class Video extends Model
{
  use HasFactory;
  protected $perPage =18;

  protected $fillable = ['name', 'slug', 'lenght', 'url', 'thumbnail', 'description', 'category_id'];


  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function getDescriptionAttribute($description)
  {
    return Str::limit($description, 40) . '...';
  }

  public function getCreatedAtAttribute($created_at)
  {
    return (new Verta($created_at))->formatDifference();
  }


  public function getlengthInHumanAttribute($lenght)
  {
    return gmdate('h:i', $lenght) . ' ثانیه';
  }

  public function relatedVideos(int $count = 8)
  {
    return $this->category->getRandomVideos($count,$this->id);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function getCategoryNameAttribute()
  {
    return $this->category?->name;
  }
}
