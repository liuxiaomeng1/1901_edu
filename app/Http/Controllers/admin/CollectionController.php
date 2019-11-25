<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CollectionController extends Controller
{
    //收藏夹展示
    public function index()
    {
        $u_id = $_GET['u_id'];

        $data=DB::table('collection')->where('u_id',$u_id)->get();
        $count=DB::table('collection')->where('u_id',$u_id)->count();
//        dd($count);
//        dd($data);
        return view('collection/index',['data'=>$data,'count'=>$count]);
    }

    //收藏夹详细列表
    public function coll_index()
    {
        $coll_id = $_GET['coll_id'];
        $u_id = $_GET['u_id'];
        //echo $u_id;
        //echo $coll_id;
        $data=DB::table('collect')
            ->join('class','collect.class_id','=','class.class_id')
            ->join('collection','collect.coll_id','=','collect.coll_id')
            ->where('collect.coll_id',$coll_id)
            ->where('collect.u_id',$u_id)
            ->get();
        //dd($data);
        $count=DB::table('collect')->where('coll_id',$coll_id)->count();
        return view('collection/coll_index',['data'=>$data,'count'=>$count]);
    }
}
