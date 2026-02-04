<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('announcements')->update([
            'content' => DB::raw("CASE 
                WHEN content IS NULL OR content = '' THEN NULL 
                ELSE '[]' 
            END")
        ]);
        Schema::table('announcements', function (Blueprint $table) {
            $table->json('content')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->text('content')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */

};
