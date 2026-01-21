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

        Schema::create('lowongan_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan');
            $table->enum('jurusan', ["rpl","tkj","mekatronika","tl","semua"]);
            $table->string('gambar');
            $table->string('judul_lowongan');
            $table->string('lokasi');
            $table->enum('tipe_kerja', ["full-time","part-time","kontrak","magang","freelance"]);
            $table->text('jobdesk_kerja')->comment('posisi dan jobdesk');
            $table->integer('gaji')->nullable();
            $table->text('kualifikasi');
            $table->dateTime('create_date');
            $table->date('batas_waktu');
            $table->enum('tipe_loker', ["keperusahaan","kebkk"]);
            $table->string('kontak');
            $table->string('entryId');
            $table->integer('kuota_lowongan');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_kerja');
    }
};
