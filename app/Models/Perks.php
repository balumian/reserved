<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Perks extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];

    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

}
