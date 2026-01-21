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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'nama_lengkap');
            $table->string('nisn')->unique()->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('agama', ["islam","protestan","kristen","buddha","hindu","konghucu"])->nullable();
            $table->enum('jenis_kelamin', ["laki-laki","perempuan"])->nullable();
            $table->enum('jurusan', ["rpl","tkj","mekatronika","tl"])->nullable();
            $table->string('CVuser')->nullable();
            $table->string('sertifikat')->nullable();
            $table->enum('status', ["bekerja","kuliah","wiraswasta","menganggur"])->nullable();
            $table->date('tahun_lulus')->nullable();
            $table->enum('role', ["admin","user"]);
            $table->index(['nisn', 'nama_lengkap', 'jenis_kelamin', 'jurusan', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['nisn', 'nama_lengkap', 'jenis_kelamin', 'jurusan', 'status']);
            $table->dropColumn([
                'nisn', 'tanggal_lahir', 'tempat_lahir', 'alamat', 'no_hp',
                'agama', 'jenis_kelamin', 'jurusan', 'CVuser', 'sertifikat',
                'status', 'tahun_lulus', 'role'
            ]);
            $table->renameColumn('nama_lengkap', 'name');
        });
    }
};
