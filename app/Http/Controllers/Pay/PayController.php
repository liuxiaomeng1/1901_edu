<?php

namespace App\Http\Controllers\Pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    //添加支付方式
    public function pay_add()
    {
        return view('pay/pay_add');
    }
    //支付方式执行
    public function pay_add_do()
    {
        $data = request()->all();
        $data['is_del']=1;
        $response = DB::table('payment')->insert($data);
        if ($response){
            echo "<script>alert('添加成功');location.href='/pay/pay_list';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/pay/pay_list';</script>";
        }
    }
    //支付方式展示
    public function pay_list()
    {
        $pay_data = DB::table('payment')->where('is_del',1)->get();
        return view('pay/pay_list',compact('pay_data'));
    }
    //支付方式shanchu
    public function pay_del()
    {
        $pay_id = $_GET['pay_id'];
        $pay_data = DB::table('payment')->where('pay_id',$pay_id)->update(['is_del'=>0]);
        if ($pay_data){
            echo "<script>alert('删除成功');location.href='/pay/pay_list';</script>";
        }else{
            echo "<script>alert('失败失败');location.href='/pay/pay_list';</script>";
        }

    }
    //支付方式xiugai
    public function pay_edit()
    {
        $pay_id = $_GET['pay_id'];
        $pay_data = DB::table('payment')->where('pay_id',$pay_id)->get();
        return view('pay/pay_edit',compact('pay_data'));
    }
    //支付方式xiugaizhixing
    public function pay_edit_do()
    {
        $data = request()->all();
        $data['is_del']=1;
        //dd($data);
        $response = DB::table('payment')->where('pay_id',$data['pay_id'])->update($data);
        if ($response){
            echo "<script>alert('添加成功');location.href='/pay/pay_list';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/pay/pay_list';</script>";
        }
    }
}
