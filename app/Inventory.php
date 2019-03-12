<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Inventory extends Model
{
  use Uuids;

  protected $fillable = ['inventory_id'];

  protected $primaryKey = 'inventory_id';

  public $incrementing = false;

  protected $table = 'inventory';

  public function product()
    {
        return $this->belongsTo('App\Product','product_id','product_id');
    }
}
