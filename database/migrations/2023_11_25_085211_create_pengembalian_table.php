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
        Schema::create('pengembalians', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->unsignedBigInteger('pelanggan_id');
        $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
        $table->unsignedBigInteger('mobil_id');
        $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
        $table->date('tanggal_mulai');
        $table->date('tanggal_akhir');
        $table->timestamps();
        $table->integer('total_hari');
        $table->integer('total_tagihan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalians');
    }

};
