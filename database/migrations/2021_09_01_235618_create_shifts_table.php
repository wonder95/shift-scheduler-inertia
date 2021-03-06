<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('user_id')
                ->nullable()
                ->references('id')
                ->on('users');

            $table->foreignId('station_id')
                ->references('id')
                ->on('stations');
            $table->enum('am_pm', ['am', 'pm'])->default('pm');
            $table->boolean('unavailable')->default(0);
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
        Schema::dropIfExists('shifts');
    }
}
