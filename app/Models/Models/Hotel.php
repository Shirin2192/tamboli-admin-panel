<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    protected $fillable = ['package_id', 'name', 'location', 'rating', 'image'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
