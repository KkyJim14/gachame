<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Product extends Model
{
  use Uuids;

  protected $fillable = ['product_id'];

  protected $primaryKey = 'product_id';

  public $incrementing = false;

  protected $table = 'product';
}
