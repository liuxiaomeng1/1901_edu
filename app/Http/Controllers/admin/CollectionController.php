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
        $data=DB::table('collection')->get();
        $count=DB::table('collection')->count();
//        dd($count);
//        dd($data);
        return view('collection/index',['data'=>$data,'count'=>$count]);
    }

    //收藏夹详细列表
    public function coll_index()
    {
        $data=DB::table('collect')->get();
        $count=DB::table('collect')->count();
        return view('collection/coll_index',['data'=>$data,'count'=>$count]);
    }
}
