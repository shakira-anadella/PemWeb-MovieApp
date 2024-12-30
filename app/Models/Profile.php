<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Profile extends Model
{
  use HasFactory, HasUuids;
 
  public $incrementing = false;
 
  protected $table = 'profiles';
 
  protected $primaryKey = 'id';
 
  protected $keyType = 'string';
 
  protected $fillable = [
    'biodata',
    'age',
    'address',
    'avatar',
    'user_id', 
  ];
  
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}