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
        Schema::create('bands_concerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('concert_id');
            $table->unsignedBigInteger('band_id');
            $table->foreign('concert_id')->references('id')->on('concerts')->onDelete('cascade');
            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
            // $table->primary(['concert_id', 'band_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bands_concerts');
    }
};
