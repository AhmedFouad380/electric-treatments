<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAskPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ask_permissions', function (Blueprint $table) {
            $table->id();
            $table->date('permission_date');
            $table->time('from');
            $table->time('to');
            $table->string('reason');
            $table->string('description');
            $table->date('request_date');
            $table->enum('status',['accepted','declined','notyet'])->default('notyet');
//            $table->bigInteger('user_id');
            $table->foreignId('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('manager_id'); //?
//            $table->bigInteger('job_id');
            $table->foreignId('job_id')->unsigned()->references('id')->on('jobs')->onDelete('restrict');
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
        Schema::dropIfExists('ask_permissions');
    }
}
