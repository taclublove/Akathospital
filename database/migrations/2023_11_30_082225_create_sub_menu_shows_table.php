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
        Schema::create('sub_menu_shows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_menu_show_id');
            $table->foreign('main_menu_show_id')->references('id')->on('main_menu_shows');
            $table->string('sub_menu_show_name');
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
        Schema::dropIfExists('sub_menu_shows');
    }
};
