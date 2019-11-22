<?php

namespace App\Http\Controllers\class1;

use App\Model\Class1;
use App\Model\Class2;
use App\Model\Eva;
use App\Model\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    //添加分类页面
    public function class_cate_add()
    {
        $p_category=Class1::where('pid',0)->get()->toArray();
      //  dd($p_category);
        return view('/class/class_cate_add',compact('p_category'));
    }
    //添加分类执行
    public function class_cate_add_do()
    {

        $data=request()->all();
        //return $data;
        $cate_name=$data['cate_name'];
        $pid=$data['pid'];
        $add_time=time();
        $data=[
            'cate_name'=>$cate_name,
            'pid'=>$pid,
            'is_del'=>1,
            'add_time'=>$add_time,
        ];
        $cate_response=Class1::insert($data);
        if ($cate_response){
            return (['code'=>1,'msg'=>'添加成功']);
        }else{
            return (['code'=>0,'msg'=>'添加失败']);
        }
    }
    //分类展示
    public function class_cate_list()
    {
        $cate_data=Class1::get()->toArray();
        $cate_data=$this->createTree($cate_data);
        $cate_num=Class1::count();
       // dd($cate_num);
        return view('/class/class_cate_list',compact('cate_data','cate_num'));
    }
    //课程添加
    public function class_add()
    {
        $teacher = DB::table('teacher')->get()->toArray();
        $category = Class1::where('is_del','!=',0)->get()->toArray();
        //dd($category);
        return view('/class/class_add',compact('teacher','category'));
    }
    //课程添加执行
    public function class_add_do()
    {
        $data=request()->all();
        $data['create_time']=time();
        $file=$_FILES['class_img'];
        $file_path = Class1::file_add($file);
        $data['class_img'] = $file_path;

        $response=Class2::insert($data);
        if ($response){
            echo "<script>alert('添加成功');location.href='/class/class_list'</script>";
        }
    }
    //课程展示
    public function class_list()
    {
        $class_info=DB::table('class')
            ->where(['class.is_del'=>1])
            ->join('teacher','class.teacher_id','=','teacher.teacher_id')
            ->join('category','class.cate_id','=','category.cate_id')
            ->get()
            ->toArray();
        // dd($class_info);
        return view('/class/class_list',compact('class_info'));
    }
    //课程删除
    public function class_del($class_id)
    {
        $response = Class2::where('class_id',$class_id)->update(['is_del'=>0]);
        if ($response){
            echo "<script>alert('删除成功');location.href='/class/class_list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/class/class_list'</script>";
        }
    }
    //课程修改
    public function class_edit($class_id)
    {
        $edit_data=Class2::where('class_id',$class_id)->get()->toArray();
        $teacher = Teacher::where('is_del',1)->get()->toArray();
        //dd($edit_data);
        $category = Class1::where('is_del','!=',0)->get()->toArray();
        return view('class/class_edit',compact('edit_data','teacher','category'));
    }
    //课程修改执行
    public function class_edit_do()
    {
        $data=request()->all();
        $data['create_time']=time();
        $file=$_FILES['class_img'];
        $file_path = Class1::file_add($file);
        $data['class_img'] = $file_path;

        $response=Class2::where('class_id',$data['class_id'])->update($data);
        if ($response){
            echo "<script>alert('添加成功');location.href='/class/class_list'</script>";
        }
    }
    //课程评论
    public function class_eva($class_id)
    {
        $eva_data = Eva::where(['class_id' => $class_id])
            ->join('user','evaluate.u_id','=','user.u_id')
            ->join('user_detail','evaluate.u_id','=','user_detail.u_id')
            ->where(['is_del' => 1])
            ->where(['p_id' => 0])
            ->get()
            ->toArray();
       // dd($eva_data);
        $class = Class2::where('class_id',$class_id)->get()->toArray();

        return view('class/class_eva',compact('eva_data','class'));
    }
    //评论课程
    public function class_eva_add($class_id)
    {
        $data= Class2::where('class_id',$class_id)->get()->toArray();
        return view('class/class_eva_add',compact('class_id','data'));
    }
    //评论课程执行
    public function class_eva_add_do()
    {
        $data=request()->all();
        $data['u_id']=0;
        $data['create_time']=time();
        $data['p_id']=0;
        $data['e_num']=0;
//dd($data);
        $a = Eva::insert($data);
        if ($a){
            echo "<script>alert('评论成功');location.href='/class/class_list';</script>";
        }else{
            echo "<script>alert('评论失败');location.href='/class/class_list';</script>";
        }
    }
    //查看评论
    public function class_eva_eva($e_id)
    {
        $eva_p = Eva::where('p_id',$e_id)
            ->where('is_del',1)
            ->join('user_detail','evaluate.u_id','=','user_detail.u_id')
            ->get()
            ->toArray();
        $eva = Eva::where('e_id',$e_id)->get()->toArray();
        //dd($eva);
        return view('class/eva',compact('eva_p','eva'));
    }
    //删除评论
    public function class_eva_del($e_id)
    {
        $a = Eva::where('e_id',$e_id)->update(['is_del'=>0]);
        if ($a){
            echo "<script>alert('删除成功');hostory.go(-1);</script>";
        }else{
            echo "<script>alert('删除失败');hostory.go(-1);</script>";
        }
    }
    //追加评论''''
    public function eva_add($e_id)
    {
        $eva = Eva::where('e_id',$e_id)->get()->toArray();
        //dd($eva);
        return view('/class/eva_add',compact('eva'));
    }
    //追加评论执行
    public function eva_add_do()
    {
        $data = request()->all();
        $data['u_id']=0;
        $data['create_time']=time();
        $data['e_num']=0;

        $a = Eva::insert($data);
        if ($a){
            echo "<script>alert('评论成功');location.href='/class/class_list';</script>";
        }else{
            echo "<script>alert('评论失败');location.href='/class/class_list';</script>";
        }
    }


    //无限极分类
    public function createTree($data,$pid=0,$level=0)
    {
        if (!$data || !is_array($data)) {
            return;
        }
        static $arr=[];
        foreach ($data as $k=>$v){
            //dd($v);
            if ($v['pid']==$pid){

                $v['level']=$level;
                $arr[]=$v;
                self::createTree($data,$v['cate_id'],$level+1);
            }
        }
        return $arr;

    }
}
