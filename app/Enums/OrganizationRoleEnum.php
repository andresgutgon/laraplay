<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum OrganizationRoleEnum: string
{
    use EnumHelper;

    case OWNER = 'owner';
    case ADMIN = 'admin';
    case MEMBER = 'member';
}
