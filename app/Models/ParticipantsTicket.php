<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantsTicket extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi plural form dari nama model
    protected $table = 'participants_ticket';

    // Menggunakan UUID sebagai primary key
    protected $keyType = 'string';
    public $incrementing = false;

    // Kolom-kolom yang bisa diisi secara massal (mass assignment)
    protected $fillable = [
        'id',
        'participant_id',
        'event_id',
        'ticket_number',
        'price',
        'payment_data',
    ];

    // Menentukan tipe casting untuk kolom JSON
    protected $casts = [
        'payment_data' => 'array',  // Untuk casting kolom 'payment_data' menjadi array
    ];

    // Relasi dengan model Participant
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    // Relasi dengan model Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
