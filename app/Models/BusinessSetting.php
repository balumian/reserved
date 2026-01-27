<?php

namespace App\Models;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessSetting extends Model
{
    use HasFactory;

    public $fillable = ['business_id', 'price_id', 'cuisine', 'themes', 'amenities', 'experiences', 'features'];

    protected $casts = [
        'cuisine' => 'array',
        'themes' => 'array',
        'amenities' => 'array',
        'experiences' => 'array',
        'features' => 'array'
    ];
    
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
