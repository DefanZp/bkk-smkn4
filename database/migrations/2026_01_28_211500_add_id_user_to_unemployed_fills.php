<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambahkan kolom id_user ke tabel unemployed_fills
     * untuk relasi dengan user
     */
    public function up(): void
    {
        Schema::table('unemployed_fills', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable()->after('id');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unemployed_fills', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
    }
};
