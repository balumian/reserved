<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Theme extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    public $fillable = ['title','status','description'];

    public function scopeActive(Builder $query):void
    {
        $query->where('status',1);
    }
}
