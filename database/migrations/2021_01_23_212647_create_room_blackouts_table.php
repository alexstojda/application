<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomBlackoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blackouts', function (Blueprint $table) {
            $table->id();
			$table->datetime('start_time');
            $table->datetime('end_time');
            $table->timestamps();
        });
		
		Schema::create('blackout_room', function (Blueprint $table) {
			$table->foreignId('room_id')->constrained()->cascadeOnDelete();
			$table->foreignId('blackout_id')->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('blackout_room');
		Schema::dropIfExists('blackouts');
    }
}
