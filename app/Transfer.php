<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Transfer extends Model
{

    use Uuids;

    protected $fillable = ['transfer'];

    protected $primaryKey = 'transfer_id';

    public $incrementing = false;

    protected $table = 'transfer';

}
