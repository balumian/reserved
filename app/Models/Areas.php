<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Areas extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    public $fillable = ['name', 'description', 'status', 'emirates_id'];

    public function scopeActive(Builder $query):void
    {
        $query->where('status',1);
    }
    
    public function emirate(): BelongsTo
    {
        return $this->belongsTo(Emirates::class, 'emirates_id');
    }


}
