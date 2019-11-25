<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    protected $table = 'user_detail';
    protected $primaryKey="u_id";
    public $timestamps = false;
}
