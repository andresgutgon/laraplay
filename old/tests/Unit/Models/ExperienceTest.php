<?php

use App\Enums\GenderGroupBundleEnum;
use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

describe('#createGroupsFor', function () {

    describe('When is a new experience', function () {
        beforeEach(function () {
            $this->experience = Experience::factory()->create();
        });

        it('create groups', function (GenderGroupBundleEnum $bundle, array $expected_groups) {
            $this->experience->createGroupsFor($bundle);

            $groups = $this->experience->genderGroups->map(function ($group) {
                return $group->only(['gender', 'percentage', 'discount_in_cents']);
            })->toArray();

            expect($groups)->toEqual($expected_groups);
        })->with([
            'lesbian' => [
                GenderGroupBundleEnum::LESBIAN,
                [['gender' => 'female', 'percentage' => 100, 'discount_in_cents' => 0]],
            ],
            'gay' => [
                GenderGroupBundleEnum::GAY,
                [['gender' => 'male', 'percentage' => 100, 'discount_in_cents' => 0]],
            ],
            'hetero' => [
                GenderGroupBundleEnum::HETERO,
                [
                    [
                        'gender' => 'female',
                        'percentage' => 50,
                        'discount_in_cents' => 0,
                    ],
                    [
                        'gender' => 'male',
                        'percentage' => 50,
                        'discount_in_cents' => 0,
                    ],
                ],
            ],
            'custom' => [
                GenderGroupBundleEnum::CUSTOM,
                [
                    [
                        'gender' => 'female',
                        'percentage' => 50,
                        'discount_in_cents' => 0,
                    ],
                    [
                        'gender' => 'male',
                        'percentage' => 50,
                        'discount_in_cents' => 0,
                    ],
                ],
            ],
        ]);
    });

    describe('when is an existing experience', function () {
        beforeEach(function () {
            $this->experience = Experience::factory()->create();
            $this->experience->createGroupsFor(GenderGroupBundleEnum::HETERO);
        });

        it('throws an error', function () {
            $this->experience->createGroupsFor(GenderGroupBundleEnum::HETERO);
        })->throws(\App\Exceptions\ExistingGenderGroupException::class, 'Gender groups already created');
    });
});
