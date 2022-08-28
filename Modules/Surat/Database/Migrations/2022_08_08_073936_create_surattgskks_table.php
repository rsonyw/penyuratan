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
            $table->string('no_surattgskk');
            $table->string('tgl_surattgskk');
            $table->string('instansi');
            $table->string('perihal');
            $table->text('keterangan');
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
