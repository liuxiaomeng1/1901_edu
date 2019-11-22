<?php

namespace App\Http\Controllers\admin;

use App\Model\Class2;
use App\Model\Directory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DirectoryController extends Controller
{
    //课程目录添加
    public function directory_add(){
        $id = $_GET['class_id'];
        $class = Class2::where('is_del',1)
            ->get()
            ->toArray();
        return view('directory/directory_add',compact('class','id'));
    }

    //课程目录添加执行
    public function directory_do(Request $request){
        $data = $request->all();
        $class_id = $data['class_id'];
        if(!$request->hasFile('video_url') || !$data['video_url']->isValid()){
            echo "文件不存在或文件类型错误";die;
        }
        $filename = md5(time().rand(1000,9999)).".".$data['video_url']->getClientOriginalExtension();
        $path = $data['video_url']->storeAs('uploads',$filename);
//        dd($path);

        $data['video_url'] = $path;
//        dd($data);
        $res = Directory::insert($data);
        if($res){
            echo "<script>alert('章节添加成功');location.href='/class/class_list;</script>";
        }
    }

    //课程目录列表
    public function directory_list(){
        $id = $_GET['class_id'];
        //dd($id);
        $data = Directory::join('class','catalog.class_id', '=', 'class.class_id')
            ->where('catalog.is_del',0)
            ->where('catalog.class_id',$id)
            ->get();
        //dd($data);
        return view('directory/directory_list',['data'=>$data],compact('id'));
    }

    //课程目录删除
    public function directory_del(Request $request){
        $catalog_id = $request->catalog_id;
        $res = Directory::where('catalog_id',$catalog_id)->update(['is_del'=>1]);
        if($res){
            echo "<script>alert('删除成功');history.go(-1);</script>";
        }
    }

    //课程目录修改审核状态
    public function audit(Request $request){
        $catalog_id = $request->catalog_id;
        $is_audit = $request->is_audit;
        if($is_audit == 0){
            $res = Directory::where('catalog_id',$catalog_id)->update(['is_audit'=>1]);
        }elseif ($is_audit == 1){
            $res = Directory::where('catalog_id',$catalog_id)->update(['is_audit'=>0]);
        }
        if($res){
            echo "<script>alert('审核状态修改成功');history.go(-1);</script>";
        }
    }
}
