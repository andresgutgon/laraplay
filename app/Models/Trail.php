<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trail extends Model
{
    use Sluggable;

    protected $fillable = ['organization_id', 'experience_id', 'title', 'slug'];

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

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
}
