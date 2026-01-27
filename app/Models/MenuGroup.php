<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuGroup extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    public $fillable = ['title','business_id','menu_cat_id','title','description','status'];

     /**
      * Get the user that owns the MenuGroup
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function business(): BelongsTo
     {
         return $this->belongsTo(Business::class, 'business_id');
     }

     public function menucategory(): BelongsTo
     {
        return $this->belongsTo(MenuCategory::class, 'menu_cat_id');
     }

     public function menu(): HasMany
     {
        return $this->hasMany(Menu::class);
     }

     public function scopeActive(Builder $query):void
     {
         $query->where('status',1);
     }

}