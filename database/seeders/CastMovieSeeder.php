<?php
namespace Database\Seeders;
use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Database\Seeder;
class CastMovieSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $movies = Movie::all();
    $casts = Cast::all();
    
    foreach ($movies as $movie) {
      $movie->casts()->attach(
        $casts->random(rand(2, 4))->pluck('id')->toArray()
      );
    }
  }
}