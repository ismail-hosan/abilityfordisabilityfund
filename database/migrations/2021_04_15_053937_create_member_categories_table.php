<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->decimal('fee')->nullable();
            $table->decimal('incentive')->nullable();
            $table->decimal('yearly')->nullable();
            $table->longText('plans_detail')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('member_categories');
    }
}
