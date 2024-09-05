<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('level_of_education',[0,1, 2, 3, 4, 5, 6, 7, 8])->default(0);
            $table->string('degree_title')->nullable();
            $table->string('concentration')->nullable();
            $table->string('board')->nullable();
            $table->string('institute_name')->nullable();
            $table->enum('result',[0,1, 2, 3, 4, 5, 6,7, 8])->default(0);
            $table->string('marks')->nullable();
            $table->string('year_of_passing')->nullable();
            $table->string('duration')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('scale')->nullable();
            $table->string('achievement')->nullable();
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
        Schema::dropIfExists('academic_summaries');
    }
}
