<?php
namespace Database\Factories;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'id' => $this->faker->uuid,
      'review' => $this->faker->paragraph,
      'rating' => $this->faker->numberBetween(1, 5),
      'user_id' => User::factory(),
      'movie_id' => Movie::factory(),
    ];
  }
}