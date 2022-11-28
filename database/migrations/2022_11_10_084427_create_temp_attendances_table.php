<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->date('check_date');
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();
            $table->string('notes')->nullable();
            $table->string('shift')->nullable(); //?
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
        Schema::dropIfExists('temp_attendances');
    }
}
