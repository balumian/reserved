<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BusinessPackage extends Model
{
    use HasFactory;

    public function scopeActive(Builder $query):void
    {
        $query->where('status',1);
    }
    
    public function activepackage(): HasMany
    {
        return $this->hasMany(ActivePackages::class, 'package_id');
    }
}
