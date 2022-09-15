<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    use HasFactory;

    public $timestamps = false;
    // protected $fillable = ['name', 'id'];
    protected $guarded = [];

    public function newsArticles()
    {
        return $this->hasMany(NewsArticle::class);
    }
}
