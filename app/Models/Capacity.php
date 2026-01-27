<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Capacity extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['capacity'];

    public $fillable = ['capacity','description','status'];

    // Inverse Relation with business
    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
