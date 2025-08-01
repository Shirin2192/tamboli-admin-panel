<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'place',
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
    ];

    protected $dates = ['deleted_at'];
}
