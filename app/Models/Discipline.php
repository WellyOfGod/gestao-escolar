<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discipline extends BaseModel
{

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
