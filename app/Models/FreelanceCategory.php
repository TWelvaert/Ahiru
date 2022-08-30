<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelanceCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];

    public function advertisement()
    {
        return $this->hasMany(FreelanceAdvertisement::class);
    }
}
