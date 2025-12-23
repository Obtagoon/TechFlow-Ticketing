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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('tmdb_id')->nullable()->unique();
            $table->string('title');
            $table->text('synopsis')->nullable();
            $table->string('poster')->nullable();
            $table->string('backdrop')->nullable();
            $table->integer('duration')->default(120); // in minutes
            $table->decimal('rating', 3, 1)->default(0);
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->enum('status', ['now_playing', 'coming_soon', 'ended'])->default('coming_soon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
