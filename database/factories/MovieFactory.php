<?php
namespace Database\Factories;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<Movie>
 */
class MovieFactory extends Factory
{
  protected $model = Movie::class;
  /**
   * Define the model's default state.
   */
  public function definition(): array
  {
    return [
      'title' => $this->faker->sentence(3),
      'synopsis' => $this->faker->paragraph(3),
      'poster' => $this->faker->imageUrl(200, 300, 'movies', true, 'Faker'),
      'year' => $this->faker->year,
      'available' => $this->faker->boolean,
      'genre_id' => Genre::inRandomOrder()->first()->id, // Mengambil genre secara acak
    ];
  }
}