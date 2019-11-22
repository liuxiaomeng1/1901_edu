<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $table = 'catalog';
    protected $primaryKey="catalog_id";
    public $timestamps = false;
    protected $guarded=[];
}
