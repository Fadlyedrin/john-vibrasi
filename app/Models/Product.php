<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'images',
        'drive_link',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // main image (grid fallback)
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        if (!empty($this->images)) {
            return asset('storage/' . $this->images[0]);
        }

        return asset('images/placeholder.png');
    }

    // gallery images (detail page)
    public function getImagesUrlAttribute()
    {
        return collect($this->images ?? [])
            ->map(fn ($img) => asset('storage/' . $img));
    }
}
