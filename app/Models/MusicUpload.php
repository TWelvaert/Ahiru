<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicUpload extends Model
{
    use HasFactory;

    protected $table = "music_uploads";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function uploadds()
    {
        return $this->hasMany(Upload::class);
    }
    
}
