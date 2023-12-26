<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum ExperienceStatusEnum: string
{
    use EnumHelper;

    case ACTIVE = 'active';
    case DRAFT = 'draft';
}
