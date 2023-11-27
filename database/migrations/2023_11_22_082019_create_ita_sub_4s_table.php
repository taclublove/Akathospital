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
        Schema::create('ita_sub_4s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itaSub3_id');
            $table->foreign('itaSub3_id')->references('id')->on('ita_sub_3s');
            $table->string('itaSub4_name');
            $table->string('file');
            $table->string('link');
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
        Schema::dropIfExists('ita_sub_4s');
    }
};
