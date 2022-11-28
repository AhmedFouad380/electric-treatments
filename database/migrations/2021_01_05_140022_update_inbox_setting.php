<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInboxSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inboxes', function (Blueprint $table) {
            $table->string('parcode')->nullable()->after('letter_num');
            $table->string('is_assgin')->nullable()->after('parcode');
            $table->integer('is_signature')->nullable()->after('is_assgin');
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
