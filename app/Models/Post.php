<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title', 'content', 'photo'
    ];

    /***
    * One to Many relationship of a post can have many comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
