<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Participant extends Model {
    protected $fillable = ['user_id', 'experience_id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function experience(): HasOne {
        return $this->hasOne(Experience::class);
    }
}
