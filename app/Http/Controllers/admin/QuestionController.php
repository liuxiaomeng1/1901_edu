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
        return view('questions/questions');
    }


    public function questions_do(Request $request)
    {
        $data=$request->all();
//        dd($data);
        if(empty($data['q_title'])){
            echo "<script>alert('不能为空');location.href='/questions/questions';</script>";die;
        }
        $res=DB::table('questions')->insert([
            'q_title'=>$data['q_title'],
            'q_time'=>time(),

        ]);
        if($res){
            echo "<script>alert('添加成功');location.href='/questions/questions_list';</script>";
        }
    }


    public function questions_list(Request $request)
    {
        $res=DB::table('questions')->where('is_del',1)->get()->toArray();
        return view('questions/questions_list',['res'=>$res]);
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
        $data = json_decode(DB::table('questions')->where('q_id',$request->q_id)->get(),true)[0];
        return view('questions/response',['data'=>$data]);
    }

    public function response_do(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $res = DB::table('response')->insert(['r_content'=>$data['r_content'],'q_id'=>$data['q_id'],'r_time'=>time()]);
        if($res){
            echo "<script>alert('已回答');location.href='/questions/questions_list';</script>";
        }
    }

    public function response_list(Request $request)
    {
        $data = json_decode(DB::table('response')->where('q_id',$request->q_id)->get(),true);
//        dd($data);
        return view('questions/response_list',['data'=>$data]);
    }
}
