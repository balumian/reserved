<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReservationType extends Model
{
    use HasFactory;

    public $fillable = ['type','status','created_by','updated_by'];

    public function business(): HasOne
    {
        return $this->hasOne(Business::class);
    }
}
