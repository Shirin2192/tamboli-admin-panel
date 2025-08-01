<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

    protected $table = 'package_faqs';

    protected $fillable = ['package_id', 'question', 'answer'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
