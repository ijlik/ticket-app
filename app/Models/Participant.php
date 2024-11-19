<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasUuid, HasFactory;

    public function tickets()
    {
        return $this->hasMany(ParticipantsTicket::class, 'participant_id');
    }
}
