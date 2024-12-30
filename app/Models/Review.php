<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Review extends Model
{
  use HasFactory, HasUuids;
  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = false;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'reviews';
  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'id';
  /**
   * The "type" of the primary key ID.
   *
   * @var string
   */
  protected $keyType = 'string';
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'review',
    'rating',
    'user_id',
    'movie_id',
  ];
  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'id' => 'string',
  ];
  /**
   * Get the user that owns the review.
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  /**
   * Get the movie that the review belongs to.
   */
  public function movie(): BelongsTo
  {
    return $this->belongsTo(Movie::class);
  }
}