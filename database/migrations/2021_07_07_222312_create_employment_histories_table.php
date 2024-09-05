<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('c_name')->nullable();
            $table->string('c_business')->nullable();
            $table->string('c_designation')->nullable();
            $table->string('c_department')->nullable();
            $table->string('c_experiences')->nullable();
            $table->string('c_responsibilities')->nullable();
            $table->string('c_location')->nullable();
            $table->date('start_period')->nullable();
            $table->date('end_period')->nullable();
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
        Schema::dropIfExists('employment_histories');
    }
}
