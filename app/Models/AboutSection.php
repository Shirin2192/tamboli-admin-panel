<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'main_title',
        'description',
        'experience_years',
        'destinations',
        'pilgrims_served',
        'bottom_description',
        'video_url',
        'image1',
        'image2',
    ];
}
