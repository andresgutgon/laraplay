<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// TODO: Use reverse geocoding to facilitate
// location filling
// https://nominatim.openstreetmap.org/search?q=aribau%2022%20barcelona&limit=5&format=json&addressdetails=1
class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'country_id',
        'display_name',
        'road',
        'house_number',
        'state',
        'state_district',
        'lat',
        'lon',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
