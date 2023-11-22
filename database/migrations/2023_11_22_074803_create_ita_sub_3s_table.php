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
        Schema::create('ita_sub_3s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itaSub2_id');
            $table->foreign('itaSub2_id')->references('id')->on('ita_sub_2s');
            $table->string('itaSub3_name');
            $table->string('file');
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
        Schema::dropIfExists('ita_sub_3s');
    }
};
