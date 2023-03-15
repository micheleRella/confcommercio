<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'address', 'phone', 'email', 'vat_number', 'lat', 'long', 'user_id', 'city_id'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     * Get all of the shop's image.
     * 
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'commentable');
    }
}
