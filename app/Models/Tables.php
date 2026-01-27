<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Tables extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['table','chairs'];
    public $fillable = ['business_id','table','chairs','photo','description','status'];


    public function business(): BelongsTo
    {
       return $this->belongsTo(Business::class,'business_id');
    }
}
