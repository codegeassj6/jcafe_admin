<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\PostAttachment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'message',
    ];

    public function getUserDetails() {
      return $this->belongsTo(User::class, 'user_id' , 'id');
    }

    public function getComments() {
      return $this->hasMany(Comment::class, 'post_id' , 'id');
    }

    public function getPostAttachments() {
      return $this->belongsTo(PostAttachment::class, 'id' , 'post_id');
    }
}
