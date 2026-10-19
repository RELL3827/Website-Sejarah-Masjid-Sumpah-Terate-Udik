<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'history',
        'architecture',
        'cultural_value',
        'latitude',
        'longitude',
    ];

    public function getGoogleMapsQueryAttribute(): string
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude . ',' . $this->longitude;
        }

        return urlencode($this->address ?? $this->name);
    }

    public function getGoogleMapsEmbedUrlAttribute(): string
    {
        return 'https://www.google.com/maps?q=' . $this->google_maps_query . '&output=embed';
    }

    public function getGoogleMapsLinkAttribute(): string
    {
        return 'https://www.google.com/maps/search/?api=1&query=' . $this->google_maps_query;
    }
}