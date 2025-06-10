<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trashes', function (Blueprint $table) {
            $table->dropColumn('file_name');
            $table->string('old_path');
            $table->string('trashed_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trashes', function (Blueprint $table) {
            //
        });
    }
};
