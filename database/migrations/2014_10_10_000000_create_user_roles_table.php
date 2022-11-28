<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('transactions')->default(0)->nullable();
            $table->integer('transactions_Inbox')->default(0)->nullable();
            $table->integer('transactions_OutBox')->default(0)->nullable();
            $table->integer('transactions_create_in')->default(0)->nullable();
            $table->integer('transactions_create_out')->default(0)->nullable();
            $table->integer('transactions_report')->default(0)->nullable();
            $table->integer('transactions_archive')->default(0)->nullable();
            $table->integer('transactions_archive_out')->default(0)->nullable();
            $table->integer('transactions_search')->default(0)->nullable();
            $table->integer('transactions_advancedsearch')->default(0)->nullable();
            $table->integer('transactions_resendInbox')->default(1)->nullable();
            $table->integer('resources')->default(0)->nullable();
            $table->integer('resources_category')->default(0)->nullable();
            $table->integer('resources_jobs')->default(0)->nullable();
            $table->integer('resources_users')->default(0)->nullable();
            $table->integer('settings')->default(0)->nullable();
            $table->integer('settings_categoryUnits')->default(0)->nullable();
            $table->integer('settings_jopType')->default(0)->nullable();
            $table->integer('settings_banks')->default(0)->nullable();
            $table->integer('settings_nationality')->default(0)->nullable();
            $table->integer('settings_attachmentCategory')->default(0)->nullable();
            $table->integer('settings_inboxProcessType')->default(0)->nullable();
            $table->integer('settings_inboxThirdParty')->default(0)->nullable();
            $table->integer('settings_inboxType')->default(0)->nullable();
            $table->integer('settings_InboxGroup')->default(0)->nullable();
            $table->integer('copanel')->default(0)->nullable();
            $table->integer('copanel_roles')->default(0)->nullable();
            $table->integer('copanel_setting')->default(0)->nullable();
            $table->integer('copanel_lang')->default(0)->nullable();
            $table->integer('copanel_logs')->default(0)->nullable();
            $table->integer('bounses')->default(0)->nullable();
            $table->integer('system_vacations')->default(0)->nullable();
            $table->integer('shifts')->default(0)->nullable();
            $table->integer('reports')->default(0)->nullable();
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
        Schema::dropIfExists('user_roles');
    }
}
