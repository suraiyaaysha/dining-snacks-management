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
        Schema::create('menu_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('day_of_week');
            $table->foreignId('snack_id')->constrained()->onDelete('cascade');
            $table->foreignId('lunch_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_assignments');
    }
};
