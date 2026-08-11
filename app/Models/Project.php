<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'client_name',
        'location',
        'completion_date',
        'short_description',
        'full_description',
        'features',
        'image',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
