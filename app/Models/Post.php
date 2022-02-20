<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  public $incrementing = false;

  public static function boot()
  {
    parent::boot();
    self::creating(function ($model) {
      $model->id = (string) \Str::uuid();
    });
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function postReaction()
  {
    return $this->hasMany('App\Models\PostReaction', 'post_id', 'id');
  }

  public function getTotalLikesAttribute()
  {
    $postReaction = PostReaction::where('post_id', $this->id)->where('reaction', 1)->count();
    return $postReaction;
  }

  public function getUsersLikedAttribute()
  {
    $user = User::whereHas('postReaction', function ($q) {
      $q->where('post_id', $this->id)->where('reaction', 1)->latest();
    })->take(5)->get();
    return $user;
  }
}
