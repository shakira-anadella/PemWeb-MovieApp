<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Cast extends Model
{
  use HasFactory, HasUuids;
 
  public $incrementing = false;

  protected $table = 'casts';

  protected $primaryKey = 'id';

  protected $keyType = 'string';

  protected $fillable = [
    'name',
    'age',
    'biodata',
    'avatar',
  ];
  
  protected $dates = [
    'created_at',
    'updated_at',
  ];
}