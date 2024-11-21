<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';

    protected $fillable = [
        'id',
        'name',
        'email',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function tickets()
    {
        return $this->hasMany(ParticipantTicket::class, 'participant_id');
    }
}
