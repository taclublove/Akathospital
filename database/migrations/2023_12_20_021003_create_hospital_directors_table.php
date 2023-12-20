<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_directors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prefix_id');
            $table->foreign('prefix_id')->references('id')->on('prefixes');
            $table->string('fname');
            $table->string('lname');
            $table->string('position');
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('hospital_directors');
    }
};
