<?php

namespace App\Models;

use App\Enums\GenderGroupBundleEnum;
use App\Exceptions\ExistingGenderGroupException;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Parental\HasChildren;

class Experience extends Model
{
    use HasChildren;
    use HasFactory;
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

    /*
     * @return ExperienceGenderGroup[]
     */
    public function createGroupsFor(GenderGroupBundleEnum $bundle): array
    {
        throw_if(
            ! $this->genderGroups()->get()->isEmpty(),
            new ExistingGenderGroupException('Gender groups already created', $this->id)
        );

        switch ($bundle) {
            case GenderGroupBundleEnum::HETERO:
                return ExperienceGenderGroup::createHeteroGroup($this);
            case GenderGroupBundleEnum::LESBIAN:
                return ExperienceGenderGroup::createLesbianGroup($this);

            case GenderGroupBundleEnum::GAY:
                return ExperienceGenderGroup::createGayGroup($this);

            case GenderGroupBundleEnum::CUSTOM:
                return ExperienceGenderGroup::createCustomGroup($this);
        }
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

    public function custodians(): HasMany
    {
        return $this->hasMany(Custodian::class);
    }

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }

    public function trail(): HasOne
    {
        return $this->hasOne(Trail::class);
    }

    public function meeting_point(): HasOne
    {
        return $this->hasOne(Location::class);
    }

    public function genderGroups(): HasMany
    {
        return $this->hasMany(ExperienceGenderGroup::class);
    }
}
