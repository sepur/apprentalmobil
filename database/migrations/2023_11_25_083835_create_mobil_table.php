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
        Schema::create('mobils', function (Blueprint $table) {
	    $table->id();
	    $table->unsignedBigInteger('fk_jenis');
        $table->foreign('fk_jenis')->references('id')->on('jenis_mobils');
        
        
        $table->unsignedBigInteger('fk_merk');
        $table->foreign('fk_merk')->references('id')->on('merk_mobils');

        $table->unsignedBigInteger('fk_type');
        $table->foreign('fk_type')->references('id')->on('type_mobils');

        $table->string('no_plat');
        $table->string('tarif');
        $table->string('status');
        $table->string('gambar');
        $table->string('ketersediaan');
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
        Schema::dropIfExists('mobils');
    }
};
