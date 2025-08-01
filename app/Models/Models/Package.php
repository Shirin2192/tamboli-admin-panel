<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'nights', 'price', 'rating',
        'short_description', 'full_description', 'image',
        'category_id'
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function includes()
    {
        return $this->hasMany(IncludeItem::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
