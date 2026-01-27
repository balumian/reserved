<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Emirates extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    public $fillable = ['name','status','description'];

    public function scopeActive(Builder $query):void
    {
        $query->where('status',1);
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Areas::class);
    }
}
