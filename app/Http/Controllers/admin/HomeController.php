<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller
{
    public function add()
    {
        $class_id = $_GET['class_id'];
        //dd($class_id);
        $class=DB::table('class')->where('class_id',$class_id)->get();
        $catalog=DB::table('catalog')->where('class_id',$class_id)->get()->toArray();
        return view('home/add',compact('class_id','catalog','class'));
    }

    public function add_do()
    {
        $data=request()->all();

        $res=DB::table('job')->insert($data);
        if($res){
            echo "<script>alert('作业添加完成');location.href='/home/index';</script>";
        }else{
            echo "<script>alert('请再试一遍');history.go(-1);</script>";
        }
    }

    public function index()
    {
        $data=DB::table('job')
            ->join('class','job.class_id','=','class.class_id')
            ->join('catalog','job.catalog_id','=','catalog.catalog_id')
            ->get();
        return view('home/index',['data'=>$data]);
    }
}
