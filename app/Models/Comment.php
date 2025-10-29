<?php

namespace App\Models;

use App\Models\Traits\Likeable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory, Likeable;

  protected $fillable = ['user_id', 'body'];

  public function video()
  {
    return $this->belongsTo(Video::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function getCreatedAtAttribute($created_at)
  {
    return (new Verta($created_at))->formatDifference();
  }
}
