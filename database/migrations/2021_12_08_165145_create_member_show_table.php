<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_show', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->unsigned();
            $table->integer('m_id')->nullable();
            $table->integer('m_name')->nullable();
            $table->integer('m_email')->nullable();
            $table->integer('m_phone')->nullable();
            $table->integer('m_designation')->nullable();
            $table->integer('m_blood')->nullable();
            $table->integer('m_reference')->nullable();
            $table->integer('m_pay')->nullable();
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
        Schema::dropIfExists('member_show');
    }
}
