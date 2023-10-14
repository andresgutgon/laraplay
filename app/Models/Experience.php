<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Experience extends Model
{
    use Sluggable;

    protected $fillable = [
        'title',
        'location_id',
        'status',
        'date',
        'time',
        'price_in_cents',
        'is_free',
    ];

    /**
     * @return array<string, array<string, string>>
     */
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }

    public function organization(): HasOne
    {
        return $this->hasOne(Organization::class);
    }

    public function meeting_point(): HasOne
    {
        return $this->hasOne(Location::class);
    }
}
