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

        Schema::create('work_fills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->date('start_date');
            $table->enum('contract_type', ["kontrak","pekerja-tetap","freelance"]);
            $table->enum('work_time', ["part-time","full-time","freelance"]);
            $table->text('job_field');
            $table->enum('salary', ["sesuai-umr","dibawah-umr","diatas-umr"]);
            $table->string('location');
            $table->string('company_name');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_fills');
    }
};
