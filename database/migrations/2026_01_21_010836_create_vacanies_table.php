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
            $table->enum('major', ["rpl","tkj","mekatronika","tl","semua"]);
            $table->string('image');
            $table->string('vacancy_name');
            $table->string('location');
            $table->enum('employment_classification', ["full-time","part-time","kontrak","magang","freelance"]);
            $table->text('jobdesk')->comment('posisi dan jobdesk');
            $table->integer('salary')->nullable();
            $table->text('requirements');
            $table->dateTime('create_date');
            $table->date('deadline');
            $table->enum('loker_tipe', ["keperusahaan","kebkk"]);
            $table->string('contact_person');
            $table->string('entryId');
            $table->integer('vacancy_number');
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
