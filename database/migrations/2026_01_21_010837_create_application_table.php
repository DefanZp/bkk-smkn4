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

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vacancy');
            $table->foreign('id_vacancy')->references('id')->on('vacancies');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->enum('status', ["dikirim","diproses","diterima","ditolak"]);
            $table->dateTime('create_date');
        });

        Schema::enableForeignKeyConstraints();
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
