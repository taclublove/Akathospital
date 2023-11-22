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
        Schema::create('ita_sub_1s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itaMain_id');
            $table->foreign('itaMain_id')->references('id')->on('ita_mains');
            $table->string('ita_sub_name');
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
        Schema::dropIfExists('ita_sub_1s');
    }
};
