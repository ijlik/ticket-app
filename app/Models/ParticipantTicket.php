<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantTicket extends Model
{
    use HasFactory;

    protected $table = 'participant_tickets';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'participant_id',
        'event_id',
        'ticket_number',
        'price',
        'payment_data',
    ];

    protected $casts = [
        'id' => 'string',
        'participant_id' => 'string',
        'event_id' => 'string',
        'payment_data' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($ticket) {
            $ticket->id = (string) Str::uuid();
        });
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
