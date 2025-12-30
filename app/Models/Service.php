<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'images',
        'features',
        'sort_order',
        'is_featured',
        'is_active',
        'youtube_url',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'images'   => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        if (!empty($this->images)) {
            return asset('storage/' . $this->images[0]);
        }

        return null;
    }
    public function getImagesUrlAttribute()
    {
        return collect($this->images ?? [])
            ->map(fn($img) => asset('storage/' . $img));
    }
}
