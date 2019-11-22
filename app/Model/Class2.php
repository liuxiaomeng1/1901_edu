<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Class2 extends Model
{
    public $timestamps=false;
    protected $table="class";
    protected $paimarykey='class_id';
}
