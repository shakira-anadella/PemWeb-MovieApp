<?php
namespace Database\Seeders;
use App\Models\Cast;
use Illuminate\Database\Seeder;
class CastSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Cast::factory()->count(4)->create();
  }
}