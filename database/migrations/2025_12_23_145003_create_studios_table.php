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
        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cinema_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., "Studio 1", "Studio 2"
            $table->enum('type', ['regular', 'imax', 'premiere', '4dx'])->default('regular');
            $table->integer('capacity')->default(100);
            $table->integer('rows')->default(10);
            $table->integer('seats_per_row')->default(10);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};
