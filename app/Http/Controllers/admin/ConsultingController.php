<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ConsultingController extends Controller
{
    //咨询添加
    public function add()
    {
        return view('consulting/add');
    }

    public function add_do()
    {
        $data=request()->all();
//        dd($data);
        $data=[
            'infor_title'=>$data['infor_title'],
            'infor_content'=>$data['infor_content'],
            'infor_time'=>time()
        ];
        $res=DB::table('information')->insert($data);
        if($res){
            echo "<script>alert('成功添加一条资讯新闻呦');location.href='/consulting/index';</script>";
        }else{
            echo "<script>alert('请重试');history.go(-1);</script>";
        }
    }

    public function index()
    {
        $data=DB::table('information')->where(['is_del'=>1])->get();
        $count=DB::table('information')->count();
        return view('consulting/index',['data'=>$data,'count'=>$count]);
    }

    public function del()
    {
        $infor_id = request()->infor_id;
        $data = DB::table('information')->where(['infor_id' => $infor_id])->update(['is_del'=>0]);
        if ($data) {
            echo "<script>alert('删除成功');history.go(-1);</script>";
        } else {
            echo "<script>alert('删除失败，请重试');history.go(-1);</script>";
        }
    }


    public function edit()
    {
        $infor_id=request()->infor_id;
        $data=DB::table('information')->where(['infor_id'=>$infor_id])->get()[0];
//        dd($data);
        return view('consulting/edit',['data'=>$data]);
    }

    public function update()
    {
        $data=request()->all();
        $res=DB::table('information')->where(['infor_id'=>$data['infor_id']])->update($data);
        if($res){
            echo "<script>alert('修改成功呦');location.href='/consulting/index';</script>";
        }else{
            echo "<script>alert('不好意思，请再试一次吧');history.go(-1);</script>";
        }
    }
}
