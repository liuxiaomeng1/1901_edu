<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Userdetail;
use App\Model\Teacher;
use DB;

class UserController extends Controller
{
    //用户列表
    public function user_list(){
        $data = json_decode(DB::table('admin')->get(),true);
//        dd($data);
        return view('user/user_list',['data'=>$data]);
    }

    //会员修改状态
    public function card(Request $request){
        $admin_id = $request->admin_id;
//        dd($admin_id);

        $data = json_decode(DB::table('admin')->where('admin_id',$admin_id)->get(),true)[0];
        //dd($status);
        if($data['admin_status'] == 0){
            $res = DB::table('admin')->where('admin_id',$admin_id)->update(['admin_status'=>1]);
            if($res) {
                if ($data['email'] == '') {
                    $user_res = DB::table('user')->insert(['u_email' => $data['email'], 'u_pwd' => $data['password'], 'u_status' => 0]);
                }else{
                    $user_res = DB::table('user')->where('u_email',$data['email'])->update(['u_status' => 0]);
                }
                return "<script>alert('操作成功');location.href='/user/user_list';</script>";
            }
        }elseif ($data['admin_status'] == 1){
            $res = DB::table('admin')->where('admin_id',$admin_id)->update(['admin_status'=>0]);
            if($res) {
                $user_res = DB::table('user')->update(['u_status' => 1]);
                return "<script>alert('操作成功');location.href='/user/user_list';</script>";
            }
        }
    }
    public function index()
    {
        $data=Userdetail::get()->toArray();
        $count=Userdetail::count();
//        dd($data);
        return view('user/index',['data'=>$data,'count'=>$count]);
    }

    public function index_do()
    {
        $u_id=request()->u_id;
//        dd($data);
        if($u_id){
            $res=Userdetail::where(['u_id'=>$u_id])->update(['u_status'=>1]);
            $data=[
                'teacher_name'=>$res['u_name']
            ];
            $info=Teacher::insert($data);
            if($info){
                echo "<script>alert('升级讲师成功');location.href='/user/index';</script>";
            }else{
                echo "<script>alert('升级讲师失败');history.go(-1);</script>";
            }
        }
    }
}
