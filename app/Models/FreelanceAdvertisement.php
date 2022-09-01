<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceAdvertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'type',
        'slug',
        'title',
        'description'
    ];
    public function category()
    {
        return $this->belongsTo(FreelanceCategory::class);
    }
    // checks if post belongs to wich author
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
