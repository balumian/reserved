<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ActivePackages extends Model
{
    use HasFactory;

    public $fillable = ['business_id', 'reservations', 'contacts', 'status', 'package_id','price','custom'];

    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function businesspackage():BelongsTo
    {
        return $this->belongsTo(BusinessPackage::class, 'package_id');
    }
}
