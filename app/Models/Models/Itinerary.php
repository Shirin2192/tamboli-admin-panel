<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itinerary extends Model
{
    use SoftDeletes;

    protected $table = 'package_itinerary';

    protected $fillable = ['package_id', 'day', 'title', 'description'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
