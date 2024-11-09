<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasUuid;

class Event extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'banner_image',
        'price',
    ];

    protected $casts = [
        'id' => 'string',
        'start_date' => 'datetime',
    ];
}
