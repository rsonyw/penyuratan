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
        Schema::create('datapegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tanggal_masuk')->nullable();
            $table->string('tanggal_penetapan')->nullable();
            $table->string('nip')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('saku')->nullable();
            $table->string('representatif')->nullable();
            $table->string('ttd')->nullable();
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
        Schema::dropIfExists('datapegawais');
    }
};
