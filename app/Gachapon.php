<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Gachapon extends Model
{
  use Uuids;

  protected $fillable = ['gachapon_id'];

  protected $primaryKey = 'gachapon_id';

  public $incrementing = false;

  protected $table = 'gachapon';
}
