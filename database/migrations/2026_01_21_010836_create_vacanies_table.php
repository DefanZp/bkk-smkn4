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

        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->json('major')->nullable();
            $table->string('image')->nullable();
            $table->string('vacancy_name');
            $table->string('location')->nullable();
            $table->enum('employment_classification', ["full-time","part-time","kontrak","magang","freelance"])->nullable();
            $table->text('jobdesk')->nullable();
            $table->integer('salary')->nullable();
            $table->text('requirements')->nullable();
            $table->date('deadline')->nullable();
            $table->enum('loker_tipe', ["keperusahaan","kebkk"]);
            $table->string('contact_person')->nullable();
            $table->string('entryId')->nullable();
            $table->integer('vacancy_number')->nullable();
            $table->timestamps();
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
