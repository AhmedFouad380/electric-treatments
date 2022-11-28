<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('type');
//            $table->integer('type_id');
            $table->foreignId('type_id')->unsigned()->nullable()->references('id')->on('inbox_types')->onDelete('restrict');
//            $table->integer('attach_type_id');
            $table->foreignId('attach_type_id')->unsigned()->references('id')->on('attachment_categories')->onDelete('restrict');

            $table->integer('sender_id'); //?
            $table->integer('reciver_id'); //?
            $table->longText('description');
            $table->longText('letter');
            $table->integer('is_urgent');
            $table->integer('is_secret');
            $table->integer('is_archive_reciver')->default(0);
            $table->integer('is_confirm')->nullable();
            $table->integer('is_read')->default(0);
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
        Schema::dropIfExists('inboxes');
    }
}
