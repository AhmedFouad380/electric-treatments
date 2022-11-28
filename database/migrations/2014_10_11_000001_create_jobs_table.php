<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('job_num')->unique()->nullable();
            $table->longText('job_description')->nullable();
//            $table->integer('category_id');
            $table->foreignId('category_id')->unsigned()->references('id')->on('categories')->onDelete('cascade');
//            $table->integer('job_type');
            $table->foreignId('job_type')->unsigned()->references('id')->on('job_types')->onDelete('cascade');

            $table->integer('job_degree');
            $table->integer('job_role'); //?
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
        Schema::dropIfExists('jobs');
    }
}
