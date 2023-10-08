<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';

    protected $fillable = ['gender'];

    // Enum can be used in validations. Check "Enum rule validation"
    protected $cast = [
        'gender' => GenderEnum::class,
    ];
}
