<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// Import HasOne
class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, HasUuids;
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'role_id',
  ];
  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];
  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];
  /**
   * Define the relationship with the Role model.
   */
  public function role(): BelongsTo
  {
    return $this->belongsTo(Role::class); 
  }
  /**
   * Define the relationship with the Profile model.
   * Each user has one profile.
   */
  public function profile(): HasOne
  {
    return $this->hasOne(Profile::class); 
  }
}