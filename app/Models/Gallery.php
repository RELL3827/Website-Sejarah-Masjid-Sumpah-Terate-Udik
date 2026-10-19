<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'year',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): string
    {
        return image_url($this->image, 'images/masjid/gallery-placeholder.jpg');
    }

    public static function categories(): array
    {
        return [
            'Bangunan Masjid',
            'Interior',
            'Eksterior',
            'Kegiatan Keagamaan',
            'Dokumentasi Lama',
            'Dokumentasi Modern',
        ];
    }
}