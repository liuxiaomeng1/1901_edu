<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question_answer extends Model
{
    protected $table = 'question_answer';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//批量添加需要的指定属性
}
