<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends BaseModel
{
    public function disciplineCourse(): HasMany
    {
        return $this->hasMany(Discipline::class);
    }
}
