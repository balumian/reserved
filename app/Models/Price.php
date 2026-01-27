<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;


    public $fillable = ['price','description','status'];

    public function scopeActive(Builder $query):void
    {
        $query->where('status',1);
    }
}
