<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('volunteer_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_id');
            $table->string('term');
            $table->string('activity_volunteer')->nullable();
            $table->string('higher_education')->nullable();
            $table->string('relevant_training')->nullable();
            $table->json('reference')->nullable();
            $table->string('elaborate')->nullable();
            $table->string('position')->nullable();
            $table->string('extra_details')->nullable();
            $table->string('experience_year')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('employer_address')->nullable();
            $table->json('job_info')->nullable(); 
            // $table->string('reason_for_leaving')->nullable();
            $table->string('professional_capacity')->nullable();
            $table->string('professional_capacity_details')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('institute_address')->nullable();
            $table->string('registered_country')->nullable();
            $table->string('certificates')->nullable();
            $table->string('attended_from')->nullable();
            $table->string('attended_to')->nullable();
            $table->string('country')->nullable();
            $table->string('qualification')->nullable();
            $table->string('professional_body')->nullable();
            $table->string('type_of_registration')->nullable();
            $table->string('curriculam_activities')->nullable();
            $table->string('volunteering_at_ardrid')->nullable();
            $table->enum('status', ['Pending', "Approved"])->default('Pending');
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
        Schema::dropIfExists('volunteer_terms');
    }
}
