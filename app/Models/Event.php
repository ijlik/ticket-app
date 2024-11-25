<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasUuid;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory, HasUuid, Searchable;

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

    public function tickets()
    {
        return $this->hasMany(ParticipantTicket::class, 'event_id');
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this['id'],
            'title' => $this['title'],
            'description' => $this['description'],
            'location' => $this['location'],
            'start_date' => $this['start_date'],
            'banner_image' => $this['banner_image'],
            'price' => $this['price'],
        ];
    }

    public function getScoutKey(): mixed
    {
        return $this['id'];
    }

    public function getScoutKeyName(): mixed
    {
        return 'id';
    }
}
