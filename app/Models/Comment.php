<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "news_comments";
    protected $guarded = [];

    public function news()
    {
        return $this->belongsTo(NewsArticle::class);
    }

     public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
