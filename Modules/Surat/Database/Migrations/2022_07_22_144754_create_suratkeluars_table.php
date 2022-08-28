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
        Schema::create('suratkeluars', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('user_id')->nullable();
            $table->string('tanggal_buat')->nullable();
            $table->string('sifat')->nullable();
            $table->integer('nomor_surat')->nullable();
            $table->string('lampiran')->nullable();
            $table->text('perihal')->nullable();
            $table->string('penerima')->nullable();
            $table->text('isi')->nullable();
            $table->string('tertanda')->nullable();
            $table->string('tertanda2')->nullable();
            $table->string('jabatan')->nullable();
            $table->text('tembusan')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('dokumen')->nullable();
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
        Schema::dropIfExists('suratkeluars');
    }
};
