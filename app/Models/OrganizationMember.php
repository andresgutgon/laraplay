<?php

namespace App\Models;

use App\Enums\OrganizationRoleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizationMember extends Model {
    protected $fillable = [
        'name',
        'user_id',
        'organization_id',
    ];

    protected $casts = [
        'role' => OrganizationRoleEnum::class,
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function organization(): BelongsTo {
        return $this->belongsTo(Organization::class);
    }
}
