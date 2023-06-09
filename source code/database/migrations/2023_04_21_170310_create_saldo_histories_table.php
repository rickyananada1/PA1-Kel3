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
        Schema::create('saldo_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('saldo_id')->references('id')->on('saldo')->onDelete('cascade');
            $table->enum('method', ['deposit', 'tarik']);
            $table->double('jumlah_transaksi');
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
        Schema::dropIfExists('saldo_histories');
    }
};
