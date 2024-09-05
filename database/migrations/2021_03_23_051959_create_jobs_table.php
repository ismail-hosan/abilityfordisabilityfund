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
            $table->longtext('job_description')->default('');
            $table->string('job_type')->default('');
            $table->string('number_of_vacancies')->default('');
            $table->string('job_category')->default('');
            $table->string('employee_status')->default('');
            $table->string('application_deadline')->default('0000-00-00');
            $table->string('user_id')->default('');
            $table->string('approved_by')->default('');
            $table->string('status')->default('');
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
