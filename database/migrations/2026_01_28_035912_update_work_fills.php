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
        Schema::table('work_fills', function (Blueprint $table) {
            $table->renameColumn('job_field', 'position');
            
        });
        Schema::table('work_fills', function (Blueprint $table) {
            $table->dropColumn('contract_type');
            $table->dropColumn('work_time');
            $table->string('salary')->nullable()->change();
            $table->enum('major_relevance', ["sesuai","tidak sesuai", "mungkin"]) ->nullable()->after('salary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('work_fills', function (Blueprint $table) {
            
        });
    }
};
