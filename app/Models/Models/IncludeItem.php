<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncludeItem extends Model
{
    use SoftDeletes;

    protected $table = 'package_includes';

    protected $fillable = ['package_id', 'title'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
