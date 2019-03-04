<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class User extends Model
{

    use Uuids;

    protected $fillable = ['user_id'];

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $table = 'user';

}
