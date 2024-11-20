<?php

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
            $table->uuid('participant_id');
            $table->uuid('event_id');
            $table->string('ticket_number');
            $table->integer('price');
            $table->json('payment_data')->nullable();
            $table->timestamps();

            // Tambahkan foreign key jika perlu
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
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
