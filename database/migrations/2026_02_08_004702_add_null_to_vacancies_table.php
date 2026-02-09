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
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->integer('vacancy_number')->nullable()->change();
            $table->string('salary')->nullable()->change();
            $table->json('major')->nullable()->change();
            $table->string('employment_classification')->nullable()->change();
            $table->string('jobdesk')->nullable()->change();
            $table->string('email_company')->nullable()->change();
            $table->string('phone_company')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            //
        });
    }
};
