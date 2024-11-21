<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantTicket extends Model
{
    use HasFactory;

    protected $table = 'participant_tickets';

    protected $fillable = [
        'id',
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

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}
