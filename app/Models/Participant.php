<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['name', 'email'];

    protected static function booted()
    {
        static::creating(function ($participant) {
            $participant->id = (string) Str::uuid();
        });
    }

    public function tickets()
    {
        return $this->hasMany(ParticipantTicket::class, 'participant_id');
    }
}
