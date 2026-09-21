<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'location_key', 'code', 'floor', 'type', 'price', 'status', 'size', 'features', 'image_url', 'position',
    ];

    protected function casts(): array
    {
        return ['features' => 'array', 'price' => 'integer', 'position' => 'integer'];
    }
}