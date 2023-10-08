<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// TODO: Use reverse geocoding to facilitate
// location filling
// https://nominatim.openstreetmap.org/search?q=aribau%2022%20barcelona&limit=5&format=json&addressdetails=1
class Location extends Model
{
    protected $fillable = ['city'];
}
