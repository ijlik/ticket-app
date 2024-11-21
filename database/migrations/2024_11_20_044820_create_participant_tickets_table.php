<?php

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Participant::class);
            $table->foreignIdFor(Event::class);
            $table->string('ticket_number');
            $table->integer('price');
            $table->json('payment_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participant_tickets');
    }
}
