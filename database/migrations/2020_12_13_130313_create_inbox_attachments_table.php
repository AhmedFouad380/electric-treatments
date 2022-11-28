<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox_attachments', function (Blueprint $table) {
            $table->id();
//            $table->integer('inbox_id');
            $table->foreignId('inbox_id')->unsigned()->references('id')->on('inboxes')->onDelete('restrict');

            $table->integer('file');
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
        Schema::dropIfExists('inbox_attachments');
    }
}
