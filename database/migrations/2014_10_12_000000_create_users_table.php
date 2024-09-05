<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    { 
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->nullable()->uniqid();
            $table->string('name');
            
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('national_id_no')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_issue_date')->nullable();
            
            
            $table->string('contact_person')->default('');
            $table->string('contact_designation')->default('');
            $table->string('contact_email')->default('');
            $table->string('contact_person_phone')->default('');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->default(0)->nullable();
            $table->string('establishment')->default(0);
            $table->string('dob')->default('0000-00-00');
            $table->string('area')->default('');
            $table->string('blood')->default(0);
            $table->integer('divisions')->default(0)->nullable();
            $table->integer('district')->default(0)->nullable();
            $table->integer('thana')->default(0)->nullable();
            $table->integer('zone')->default(0)->nullable();
            $table->string('industry_type')->default('');
            $table->string('image')->default('')->nullable();
            $table->string('cv')->default('')->nullable();
            $table->string('trade_license')->default('');
            $table->string('company')->default('');
            $table->string('url')->default('');
            $table->string('gender')->default(0);
            $table->string('c_designation')->default('');
            $table->string('education')->default('');
            $table->string('e_uv')->default('');
            $table->string('e_year')->default('');
            $table->string('address')->default('');
            $table->integer('membercategory_id')->default(0);
            $table->integer('reference')->default(0)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('payment')->default(0);
            $table->tinyInteger('type')->default(1);
            $table->string('designation')->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
    
}
