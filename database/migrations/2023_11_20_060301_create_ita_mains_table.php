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
        Schema::create('ita_mains', function (Blueprint $table) {
            $table->id();
            $table->string('name_ita_main');
            $table->unsignedBigInteger('fiscalYear_id');
            $table->foreign('fiscalYear_id')->references('id')->on('fiscal_years');
            $table->string('description_ita_main');
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
        Schema::dropIfExists('ita_mains');
    }
};
