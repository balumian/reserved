<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ActivitiesAttraction extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','stitle','description'];

    public $jasonable = ['gallery'];

    public $fillable = ['title','stitle','code','phone','price','emirate','area','emirates_id','areas_id','description','gallery','cover_photo','status'];

    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class, 'cover_photo');
    }

    public function scopeActive(Builder $query):void
    {
        $query->where('status',1);
    }
    
}
