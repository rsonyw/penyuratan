<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surattgskks', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_surattgskk')->nullable();
            $table->string('no_surattgskk')->nullable();
            $table->string('kepada')->nullable();
            $table->text('untuk')->nullable();
            $table->string('waktu_pelaksanaan')->nullable();
            $table->string('tertanda')->nullable();
            $table->text('nama')->nullable();
            $table->string('perihal')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('dokumen')->nullable();
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
        Schema::dropIfExists('surattgskks');
    }
};
