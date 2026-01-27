<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','description'];
    public $fillable = ['title','menu_group_id','description','status','business_id'];

    public function menugroup(): BelongsTo
    {
        return $this->belongsTo(MenuGroup::class,'menu_group_id');
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class,'business_id');
    }
}
