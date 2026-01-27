<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'code',
        'phone',
        'nationality',
        'emirate',
        'area',
        'address',
        'avatar'

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country():BelongsTo
    {
        return $this->belongsTo(Countries::class,'nationality');
    }

    public function emirates():BelongsTo
    {
        return $this->belongsTo(Emirates::class,'emirate');
    }

    public function areas():BelongsTo
    {
        return $this->belongsTo(Areas::class,'area');
    }
    
}
