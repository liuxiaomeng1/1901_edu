<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Question;
class QuestionController extends Controller
{

    //问答模块
    public function questions()
    {
        $class_id = $_GET['class_id'];
        return view('questions/questions',compact('class_id'));
    }


    public function questions_do(Request $request)
    {
        $data=$request->all();
       $data['q_time']=time();
       $data['u_id']=0;
        if(empty($data['q_title'])){
            echo "<script>alert('不能为空');history.go(-1);</script>";die;
        }
        $res=DB::table('questions')->insert($data);
        if($res){
            echo "<script>alert('添加成功');location.href='/class/class_list';</script>";
        }
    }


    public function questions_list(Request $request)
    {
        $class_id = $_GET['class_id'];
        //dd($class_id);,
        $res=DB::table('questions')
            ->join('user_detail','questions.u_id','=','user_detail.u_id')
            ->where('is_del',1)
            ->where('class_id',$class_id)
            ->get()
            ->toArray();
        //dd($res);
        return view('questions/questions_list',['res'=>$res],compact('class_id'));
    }


    public function del(Request $request)
    {
        $q_id=$request->all()['q_id'];
//        dd($q_id);
        $re=DB::table('questions')->select('is_del')->where(['q_id'=>$q_id])->first();
        if($re->is_del==1){
            $data=DB::table('questions')->where(['q_id'=>$q_id])->update(['is_del'=>0]);
            if($data){
                echo "<script>alert('删除成功');location.href='/questions/questions_list';</script>";}
        }
    }


    public function edit(Request $request)
    {
        $q_id=$request->all()['q_id'];
        //dd($q_id);
        $data=DB::table('questions')->where(['q_id'=>$q_id])->first();
        return view('questions/edit',['data'=>$data]);
    }


    public function update(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $res=DB::table('questions')->where(['q_id'=>$data['q_id']])->update($data);
        //dd($res);
        if($res){
            echo "<script>alert('修改成功');location.href='/questions/questions_list';</script>";
        }
    }

    //回答模块
    public function  response(Request $request)
    {
        $class_id = $_GET['class_id'];
        $data = json_decode(DB::table('questions')->where('q_id',$request->q_id)->get(),true)[0];
        return view('questions/response',['data'=>$data],compact('class_id'));
    }

    public function response_do(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $res = DB::table('response')->insert(['r_content'=>$data['r_content'],'q_id'=>$data['q_id'],'r_time'=>time(),'class_id'=>$data['class_id']]);
        if($res){
            echo "<script>alert('已回答');history.go(-2);</script>";
        }
    }

    public function response_list(Request $request)
    {
        $data = json_decode(DB::table('response')
            ->join('user_detail','response.u_id','=','user_detail.u_id')
            ->where('is_del',1)
            ->where('q_id',$request->q_id)->get(),true);
       //dd($data);
        return view('questions/response_list',['data'=>$data]);
    }

    //问题问答删除
    public function response_del(Request $request)
    {
        $r_id=$request->all()['r_id'];
       // dd($q_id);
        $re=DB::table('response')->select('is_del')->where(['r_id'=>$r_id])->first();
        if($re->is_del==1){
            $data=DB::table('response')->where(['r_id'=>$r_id])->update(['is_del'=>0]);
            if($data){
                echo "<script>alert('删除成功');history.go(-1);</script>";}
        }
    }
}
