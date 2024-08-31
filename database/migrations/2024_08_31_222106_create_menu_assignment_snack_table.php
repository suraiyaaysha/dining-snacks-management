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
        Schema::create('menu_assignment_snack', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_assignment_id')->constrained()->onDelete('cascade');
            $table->foreignId('snack_id')->constrained()->onDelete('cascade');
            $table->enum('time', ['morning', 'afternoon']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_assignment_snack');
    }
};
