<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('password');
            $table->json('address')->nullable();
            $table->string('nid_number');
            $table->string('nationality')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('partner_name')->nullable();
            $table->string('partner_details')->nullable();
            $table->tinyInteger('disabled_person')->nullable();
            $table->text('disabled_details')->nullable();
            $table->string('contact_person_first_name')->nullable();
            $table->string('contact_person_family_name')->nullable();
            $table->json('contact_person_address')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_telephone')->nullable();
            $table->string('contact_person_fax')->nullable();
            $table->tinyInteger('minor_traffice')->nullable();
            $table->text('minor_traffice_details')->nullable();
            $table->string('about_ardrid')->nullable();
            $table->string('extra_details')->nullable();
            $table->dateTime('desired_arrival_date')->nullable();
            $table->dateTime('desired_departure_date')->nullable();
            $table->enum('status', ['Approved', "Active", "Pending"])->default('Approved');
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
        Schema::dropIfExists('volunteers');
    }
}
