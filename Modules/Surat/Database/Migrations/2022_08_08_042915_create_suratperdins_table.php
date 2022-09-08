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
        Schema::create('suratperdins', function (Blueprint $table) {
            $table->id();
            $table->string('no_suratperdin')->nullable();
            $table->string('tgl_suratperdin')->nullable();
            $table->string('dasar')->nullable();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pengikut1')->nullable();
            $table->string('pengikut2')->nullable();
            $table->string('pengikut3')->nullable();
            $table->string('pengikut4')->nullable();
            $table->string('pengikut5')->nullable();
            $table->string('untuk')->nullable();
            $table->string('waktu')->nullable();
            $table->string('pengesahan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('perihal')->nullable();
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
        Schema::dropIfExists('suratperdins');
    }
};
