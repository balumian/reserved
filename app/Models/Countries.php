<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Countries extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    public $fillable = ['name','iso','code'];

    public function scopeActive(Builder $query):void
    {
        $query->where('active',1);
    }

 
    
}
