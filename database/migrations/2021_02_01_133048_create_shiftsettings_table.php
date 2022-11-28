<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shiftsettings', function (Blueprint $table) {
            $table->id();
//            $table->bigInteger('shift_id')->unsigned();
            $table->foreignId('shift_id')->unsigned()->references('id')->on('shifts')->onDelete('restrict');

            $table->string('day');
            $table->time('time_attendance')->nullable();
            $table->time('start_attendance')->nullable();
            $table->time('end_attendance')->nullable();
            $table->time('time_leave')->nullable();
            $table->time('start_leave')->nullable();
            $table->time('end_leave')->nullable();
            $table->enum('vacation',['yes','no'])->default('no');
            $table->enum('nextday',['yes','no'])->default('no');
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
        Schema::dropIfExists('shiftsettings');
    }
}
