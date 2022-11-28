<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpsShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emps_shifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('shift_id')->unsigned()->references('id')->on('shifts')->onDelete('cascade');
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
        Schema::dropIfExists('emps_shifts');
    }
}
