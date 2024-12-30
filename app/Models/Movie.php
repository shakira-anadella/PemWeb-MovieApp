<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Movie extends Model
{
  use HasFactory, HasUuids;
  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = false;
  /**
   * The "type" of the auto-incrementing ID.
   *
   * @var string
   */
  protected $keyType = 'string';
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'movies';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title',
    'synopsis',
    'poster',
    'year',
    'available',
    'genre_id'
  ];
  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'string',
    'available' => 'boolean',
  ];
  public function genre(): BelongsTo
  {
    return $this->belongsTo(Genre::class);
  }

  public function casts(): BelongsToMany
  {
    return $this->belongsToMany(Cast::class, 'cast_movies', 'movie_id', 'cast_id');
  }
}