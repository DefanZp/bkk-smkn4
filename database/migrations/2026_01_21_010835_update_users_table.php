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
            $table->renameColumn('name', 'full_name');
            $table->string('nisn')->unique()->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->text('address')->nullable();
            $table->string('no_hp')->nullable();
            $table->enum('religion', ["islam","protestan","kristen","buddha","hindu","konghucu"])->nullable();
            $table->enum('gender', ["laki-laki","perempuan"])->nullable();
            $table->enum('major', ['Animasi', 'Desain Komunikasi Visual', 'Logistik', 'Perhotelan','Teknik Grafika', 'Teknik Komputer dan Jaringan', 'Rekayasa Perangkat Lunak'])->nullable();
            $table->string('CVuser')->nullable();
            $table->string('certificate')->nullable();
            $table->enum('status', ["bekerja","kuliah","wiraswasta","menganggur"])->nullable();
            $table->date('graduation_year')->nullable();
            $table->enum('role', ["admin","user"]);
            $table->index(['nisn', 'full_name', 'gender', 'major', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['nisn', 'full_name', 'gender', 'major', 'status']);
            $table->dropColumn([
                'nisn', 'birth_date', 'birth_place', 'address', 'no_hp',
                'religion', 'gender', 'major', 'CVuser', 'certificate',
                'status', 'graduation_year', 'role'
            ]);
            $table->renameColumn('full_name', 'name');
        });
    }
};
