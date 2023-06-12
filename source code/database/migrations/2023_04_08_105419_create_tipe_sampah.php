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
        Schema::create('tipe_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sampah');
            $table->text('deskripsi_tipe');
            $table->foreignId('unit_id')->references('id')->on('unit');
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
        Schema::dropIfExists('tipe_sampah');
    }
};
