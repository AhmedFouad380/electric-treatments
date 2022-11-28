<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxGroupMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox_group_members', function (Blueprint $table) {
            $table->id();
//            $table->bigInteger('group_id');
            $table->foreignId('group_id')->unsigned()->references('id')->on('inbox_groups')->onDelete('cascade');

//            $table->bigInteger('user_id');
            $table->foreignId('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('inbox_group_members');
    }
}
