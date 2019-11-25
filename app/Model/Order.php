<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps=false;
    protected $table="order";
    protected $paimarykey='order_id';
}
