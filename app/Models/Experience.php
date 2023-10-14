<?php

namespace App\Models;

use App\Enums\ExperienceTypeEnum;
use App\Models\Experiences\BasicExperience;
use App\Models\Experiences\DatingExperience;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Parental\HasChildren;

class Experience extends Model
{
    use HasChildren;
    use Sluggable;

    protected $fillable = [
        'title',
        'location_id',
        'status',
        'date',
        'time',
        'price_in_cents',
        'experience_type',
        'is_free',
    ];

    protected $childColumn = 'experience_type';

    protected function childTypes(): array
    {
        return [
            ExperienceTypeEnum::DATING->value => DatingExperience::class,
            ExperienceTypeEnum::BASIC->value => BasicExperience::class,
        ];
    }

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
