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
        Schema::create('cerita', function (Blueprint $table) {
            $table->id();
            $table->string('judul_cerita');
            $table->text('content');
            $table->string('image_header_url');
            $table->foreignId('author')->references('id')->on('unit')->onDelete('cascade');
            $table->foreignId('kategori')->references('id')->on('kategori_cerita')->onDelete('cascade');
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
        Schema::dropIfExists('cerita');
    }
};
