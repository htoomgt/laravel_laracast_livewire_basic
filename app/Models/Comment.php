<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    /***
    *
     * Many to one relationship of many comments could belong to one post
    */
    public function posts()
    {
        return $this->belongsTo(Post::class,'post_id', 'id');
    }
}
