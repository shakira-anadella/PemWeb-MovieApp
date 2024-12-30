<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('cast_movies', function (Blueprint $table) {
      $table->foreignUuid('movie_id')->references('id')->on('movies')->onDelete('cascade');
      $table->foreignUuid('cast_id')->references('id')->on('casts')->onDelete('cascade');
      $table->timestamps();
    });
  }
  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('cast_movies');
  }
};