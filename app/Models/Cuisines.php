<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;

class Cuisines extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];

    public function scopeActive(Builder $query):void
    {
        $query->where('status',1);
    }
}
