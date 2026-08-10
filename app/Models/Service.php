<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'color_class',
        'short_description',
        'full_description',
        'features',
        'image',
        'catalog_pdf',
        'catalog_doc',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
