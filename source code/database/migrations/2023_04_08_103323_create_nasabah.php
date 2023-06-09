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
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah');
            $table->string('no_rekening');
            $table->string('alamat_nasabah');
            $table->string('nik_nasabah');
            $table->foreignId('nasabah_of')->references('id')->on('unit')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('aktif')->default(0);
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
        Schema::dropIfExists('nasabah');
    }
};
