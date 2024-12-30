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
    Schema::create('movies', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('title');
      $table->text('synopsis');
      $table->string('poster')->nullable();
      $table->string('year');
      $table->boolean('available');
      $table->foreignUuid('genre_id')->constrained();
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