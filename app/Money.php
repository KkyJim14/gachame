<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Money extends Model
{
  use Uuids;

  protected $fillable = ['money_id'];

  protected $primaryKey = 'money_id';

  public $incrementing = false;

  protected $table = 'money';
}
