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
        Schema::create('suratedarans', function (Blueprint $table) {
            $table->id();
            $table->string('no_suratedaran')->nullable();
            $table->text('tentang')->nullable();
            $table->text('isi')->nullable();
            $table->string('tgl_suratedaran')->nullable();
            $table->string('instansi')->nullable();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->text('perihal')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('suratedarans');
    }
};
