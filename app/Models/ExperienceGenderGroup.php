<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class ExperienceGenderGroup extends Model {
    protected $fillable = ['gender', 'percentage', 'discount_in_cents', 'experience_id'];

    /*
     * @return ExperienceGenderGroup[]
     */
    public static function createLesbianGroup(Experience $experience): array {
        return [
            static::create([
                'gender' => GenderEnum::FEMALE->value,
                'percentage' => 100,
                'experience_id' => $experience->id,
            ]),
        ];
    }

    /*
     * @return ExperienceGenderGroup[]
     */
    public static function createGayGroup(Experience $experience): array {
        return [
            static::create([
                'gender' => GenderEnum::MALE->value,
                'percentage' => 100,
                'experience_id' => $experience->id,
            ]),
        ];
    }

    /*
     * @return ExperienceGenderGroup[]
     */
    public static function createHeteroGroup(Experience $experience): array {
        $groups = [];
        DB::transaction(function () use ($experience, &$groups) {
            $groups[] = static::create([
                'gender' => GenderEnum::FEMALE->value,
                'percentage' => 50,
                'experience_id' => $experience->id,
            ]);
            $groups[] = static::create([
                'gender' => GenderEnum::MALE->value,
                'percentage' => 50,
                'experience_id' => $experience->id,
            ]);
        });

        return $groups;
    }

    /*
     * @return ExperienceGenderGroup[]
     */
    public static function createCustomGroup(Experience $experience): array {
        return static::createHeteroGroup($experience);
    }

    public function experience(): BelongsTo {
        return $this->belongsTo(Experience::class);
    }
}
