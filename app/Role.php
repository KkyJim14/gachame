<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Role extends Model
{
  use Uuids;

  protected $fillable = ['role_id'];

  protected $primaryKey = 'role_id';

  public $incrementing = false;

  protected $table = 'role';

  public function gachapon()
    {
        return $this->belongsTo('App\Gachapon','gachapon_id','gachapon_id');
    }

  public function product()
    {
        return $this->belongsTo('App\Product','product_id','product_id');
    }

}
