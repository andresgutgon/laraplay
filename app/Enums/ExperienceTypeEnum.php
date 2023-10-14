<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum ExperienceTypeEnum: string
{
    use EnumHelper;

    case BASIC = 'basic';
    case DATING = 'dating';
}
