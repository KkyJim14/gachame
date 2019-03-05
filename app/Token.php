<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Token extends Model
{
  use Uuids;

  protected $fillable = ['token_id'];

  protected $primaryKey = 'token_id';

  public $incrementing = false;

  protected $table = 'token';
}
