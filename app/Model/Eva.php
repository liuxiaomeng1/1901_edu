<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Eva extends Model
{
    public $timestamps=false;
    protected $table="evaluate";
    protected $paimarykey='e_id';
}
