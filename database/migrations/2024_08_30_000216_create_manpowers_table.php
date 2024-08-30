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
        Schema::create('manpowers', function (Blueprint $table) {
            $table->id();
            // $table->string('shift');
            // $table->integer('count');
            $table->integer('shift_a');
            $table->integer('shift_general');
            $table->integer('shift_b');
            $table->integer('shift_c');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manpowers');
    }
};
