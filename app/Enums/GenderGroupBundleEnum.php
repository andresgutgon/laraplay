<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum GenderGroupBundleEnum: string {
    use EnumHelper;

    case LESBIAN = 'lesbian';
    case GAY = 'gay';
    case HETERO = 'hetero';
    case CUSTOM = 'custom';
}
