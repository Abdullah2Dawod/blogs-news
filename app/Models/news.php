<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class news extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'news_source', 'description'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::disk('public')->url($this->image);
        }
        return 'https://placehold.co/60x60?text=No+Image';
    }
}
