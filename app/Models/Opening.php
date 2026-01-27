<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Opening extends Model
{
    use HasFactory;

    // Relation Belongs to Business

    public $fillable = ['business_id','days_id','open','close','break','break_start','break_end','working','status'];

    public function business():BelongsTo
    {
       return $this->belongsTo(Business::class);
    }

    public function day():BelongsTo
    {
       return $this->belongsTo(WeekDays::class, 'days_id');
    }

}
