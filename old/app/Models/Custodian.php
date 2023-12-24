<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Custodian extends Model
{
    protected $fillable = ['member_id', 'experience_id'];

    public function member(): HasOne
    {
        return $this->hasOne(OrganizationMember::class);
    }

    public function experience(): HasOne
    {
        return $this->hasOne(Experience::class);
    }
}
