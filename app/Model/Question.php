<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $primaryKey="q_id";
    public $timestamps = false;
    protected $guarded=[];
}
