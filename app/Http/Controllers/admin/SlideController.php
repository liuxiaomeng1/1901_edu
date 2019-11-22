<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SlideController extends Controller
{
    //轮播图添加
    public function add()
    {
        return view('slide/add');
    }

    public function add_do(Request $request)
    {
        $data=request()->all();
//        dd($slide_weight);
        // //文件上传
        if($request->hasFile('slide_url')){
            $file=$this->upload($request,'slide_url');
            if($file['code']){
                $data['slide_url']=$file['img_url'];
            }
        }else{
            return ['图片上传失败'];
        }
        $res=DB::table('slideshow')->insert($data);
        if($res){
            echo "<script>alert('图片上传成功');location.href='/slide/index';</script>";
        }else{
            echo "<script>alert('请再试一次');history.go(-1);</script>";
        }
    }

    public function upload(Request $request,$file)
    {
        if($request->file($file)->isValid()){
            $photo = $request->file($file);
            // $extension = $photo->extension();
            $store_result = $photo->store(date('Ymd'));
//            dd($store_result);
            // $store_result = $photo->storeAs('photo', 'test.jpg');
            return['code'=>1,'img_url'=>$store_result];
        }else{
            return['code'=>0,'message'=>'图片上传失败'];
        }
    }

    public function index()
    {
        $data=DB::table('slideshow')->get();
        $count=DB::table('slideshow')->count();
//        dd($data);
        return view('slide/index',['data'=>$data,'count'=>$count]);
    }

}
