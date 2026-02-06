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
        Schema::table('vacancies', function (Blueprint $blueprint) {
            $blueprint->renameColumn('contact_person', 'email_company');
        });

        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('phone_company')->after('email_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
