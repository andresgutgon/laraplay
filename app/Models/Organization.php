<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organization extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'location_id',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return array<string, array<string, string>>
     */
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'name']];
    }
}
