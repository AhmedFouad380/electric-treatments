<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('ar_company_name');
            $table->string('en_company_name');
            $table->string('ministry_name');
            $table->string('directorate_name');
            $table->string('it_name');
            $table->integer('date_type')->default(0);
            $table->string('logo')->nullable();
            $table->string('company_seal')->nullable();
            $table->string('signature')->nullable();
            $table->integer('in_treasury_count')->default(0);
            $table->integer('out_treasury_count')->default(0);
            $table->integer('holiday_count_yearly')->nullable()->default(0);
            $table->integer('holiday_count_seasonal')->nullable()->default(0);
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
        Schema::dropIfExists('settings');
    }
}
