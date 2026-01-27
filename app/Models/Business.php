<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Business extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasSlug;

    public $translatable = ['name','overview'];

    public $fillable = [
        'user_id', 
        'name', 
        'residence_front', 
        'residence_back', 
        'passport', 
        'trade_license', 
        'license', 
        'vat', 
        'overview', 
        'cover_photo', 
        'location', 
        'menu_pdf', 
        'reservation_type', 
        'status',
        'business_type_id',
        'price_id',
        'capacity',
    ];
   
    // Relation User to Business One to One
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relation Business to Active Package One to One
    public function activepackage():HasOne
    {
        return $this->hasOne(ActivePackages::class);
    }

    // Relation Business to Opening Closing times.

    public function opening():HasMany
    {
        return $this->hasMany(Opening::class);
    }

    //  Relation Business to booking capacity

    public function capacity():HasMany
    {
        return $this->hasMany(Capacity::class);
    }
    
    //  Relation Business to Business Setings (Cuisines, Amenities, etc...)

    public function businesssettings():HasOne
    {
        return $this->hasOne(BusinessSetting::class);
    }

    public function reservationtype():BelongsTo
    {
        return $this->belongsTo(ReservationType::class,'reservation_type');
    }

    // Relation Business to Menu Groups One to Many
    public function menugroups(): HasMany
    {
        return $this->hasMany(MenuGroup::class);
    }

    // Relation Business to Perks

    public function perks(): HasMany
    {
        return $this->hasMany(Perks::class);
    }

    // Relation Business to Tables

    public function tables(): HasMany
    {
        return $this->hasMany(Tables::class);
    }

    // Relation business to media

    public function coverphoto():BelongsTo
    {
        return $this->belongsTo(Media::class,'cover_photo');
    }

    public function menus():HasMany
    {
        return $this->hasMany(Menu::class);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage('en');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status',1);
    }

}
