<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
        //登录添加
        public function create()
        {
            // echo"rt46";
            return view('landing/create');
        }

        //登录添加执行
    public function create_do()
    {
        $admin_name = request()->admin_name;
        // dd($admin_name);
        $password = request()->password;
        // dd($password);
        $password=md5($password);
        // dd($password);
        $res=DB::table('admin1')->where('admin_name','=',$admin_name)->where('password','=',$password)->first();
        // dd($res);

        if($res){
            session(['admin_name'=>$admin_name]);

            echo json_encode(['code'=>1,'font'=>'登陆成功']);
        }else{
            echo json_encode(['code'=>2,'font'=>'登陆失败']);
        }
    }


                //登录退出
                public function loginout()
                {
                    request()->session()->forget('admin_name');
                    return redirect('/landing/login');
                }



            //管理员添加
            public function admin()
            {
                // echo"45";
                return view('/landing/admin');
            }

            
                //管理员添加执行
                public function admin_do(Request $request)
                {
                    // dd(1);
                    $data = $request->except(['_token']);  //表单令牌

                    $data['create_time']=time();   //添加时间 时间戳
                    // dd($data);

                    $res = DB::table('admin1')->insert($data);  //添加语句 引用DB 
                    // dd($res);

                    if($res){
                        return redirect('/landing/admin_list');
                    }else{
                        return error('添加失败');
                    }
                    
                    
                }




                //管理员列表
                public function admin_list(Request $request)
                {
                    // dd(12);
                    $query=request()->all(); //接收所有值
                        // dd($query);
                        $data = DB::table('admin1')->get(); 
                        // dd($data);

                    return view('/landing/admin_list',['data'=>$data]);
                }


                //管理员删除
                public function admin_del()
                {
                    $id=request()->admin_id;
                    // dd($id);
                    $res = DB::table('admin1')->where('admin_id','=',$id)->delete();
                    // dd($res);
                     if($res){
                         return redirect('/landing/admin_list');
                     }else{
                         return error('删除成功');
                       
                     }
                }


                //管理员修改
                public function admin_edit()
                {
                    $id = request()->admin_id;
                    // dd($id);die;
                    $data = DB::table('admin1')->where('admin_id','=',$id)->first();
                    // dd($data);
                    return view('/landing/admin_edit',['data'=>$data]);
                }



                //管理员修改执行
                public function admin_update(Request $request)
                {
                    $data = request()->except(['_token']); //令牌
                    // dd($data);

                    $res = DB::table('admin1')->where(['admin_id'=>$admin_id])->update($data);  //修改语句

                    
                    if($res){
                        return redirect('/landing/admin_list');
                    }else{
                        return('修改失败');
                    }
                }

}
