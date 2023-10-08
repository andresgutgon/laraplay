<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum GenderEnum: string
{
    use EnumHelper;
    case MALE = 'male';
    case FEMALE = 'female';
}
