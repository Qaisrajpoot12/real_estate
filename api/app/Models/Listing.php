<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'user_id', 'featured'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function allimages()
    {
        return $this->hasMany(Image::class);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
