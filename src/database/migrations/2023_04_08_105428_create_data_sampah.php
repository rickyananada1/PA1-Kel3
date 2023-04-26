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
        Schema::create('data_sampah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_sampah')->references('id')->on('tipe_sampah')->onDelete('cascade');
            $table->integer('amount'); // in kilograms
            $table->foreignId('unit_pelapor')->references('id')->on('unit')->onDelete('cascade');
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
        Schema::dropIfExists('data_sampah');
    }
};
