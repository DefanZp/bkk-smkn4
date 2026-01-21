<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('kerja_fill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->date('waktu_mulai');
            $table->enum('jenis_kontrak', ["kontrak","pekerja-tetap","freelance"]);
            $table->enum('waktu_kerja', ["part-time","full-time","freelance"]);
            $table->text('bidang_pekerjaan');
            $table->enum('gaji', ["sesuai-umr","dibawah-umr","diatas-umr"]);
            $table->string('lokasi');
            $table->string('nama_perusahaan');
            $table->dateTime('createAt');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerja_fill');
    }
};
