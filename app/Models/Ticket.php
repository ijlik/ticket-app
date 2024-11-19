<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HasUuid;

class Ticket extends Model
{
    use HasFactory, HasUuid;
    protected $fillable = ['event_id', 'name', 'email', 'price'];

    public function event()
    {
    return $this->belongsTo(Event::class);
    }

}
