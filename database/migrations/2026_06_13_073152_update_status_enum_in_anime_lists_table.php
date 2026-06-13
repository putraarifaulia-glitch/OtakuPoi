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
        Schema::table('anime_lists', function (Blueprint $table) {
            $table->enum('status', ['Watching', 'Completed', 'On Hold', 'Dropped', 'Plan to Watch'])->default('Plan to Watch')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anime_lists', function (Blueprint $table) {
            $table->enum('status', ['Watching', 'Completed', 'Plan to Watch'])->default('Plan to Watch')->change();
        });
    }
};
