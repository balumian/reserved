<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class WeekDays extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['day'];

    public function opening():HasMany
    {
        return $this->hasMany(Opening::class, 'days_id');
    }
}
