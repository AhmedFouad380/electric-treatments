<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableInbox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inboxes', function (Blueprint $table) {
            $table->integer('is_archive_sender')->nullable()->after('is_archive_reciver');
            $table->date('date')->nullable()->after('is_confirm');
            $table->bigInteger('letter_num')->nullable()->after('date');
            $table->bigInteger('assignee_id')->nullable()->after('reciver_id'); //?
            $table->bigInteger('third_party_id')->nullable()->after('sender_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inboxes');
    }
}
