<?php

namespace App\Http\Controllers\Buy;

use App\Model\Class2;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{
    //加入购物车
    public function buy_class()
    {
        $class_id = $_GET['class_id'];
        $u_id = 0;
        $class_data = Class2::where('class_id',$class_id)->first()->toArray();
       // dd($class_data);
        $class_price = $class_data['class_price'];
       // dd($class_price);
        $order_mark = time().rand(10000,99999);
        $order = [];
        $order['order_mark'] = $order_mark;
        $order['class_id'] = $class_id;
        $order['u_id'] = $u_id;
        $order['pay_id'] = 0;
        $order['pay_price'] = $class_price;
        $order['pay_status'] = 0;

        $response = DB::table('order')->insert($order);
        if ($response){
            echo "<script>alert('加入购物车成功');location.href='/class/class_list';</script>";
        }else{
            echo "<script>alert('加入购物车失败');location.href='/class/class_list';</script>";
        }
    }
    //查看购物车
    public function car()
    {
        $u_id = 0;
        $car = Order::where('u_id',$u_id)
            ->join('class','order.class_id','=','class.class_id')
            ->join('payment','order.pay_id','=','payment.pay_id')
            ->get()
            ->toArray();
        return view('pay/car',compact('car'));
    }
    //删除订单
    public function buy_del()
    {
        $order_id = $_GET['order_id'];
        $response = Order::where('order_id',$order_id)->delete();
        if ($response){
            echo "<script>alert('删除成功');location.href='/buy/car';</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/buy/car';</script>";
        }
    }
    //购买
    public function buy_pay()
    {
        $order_id = $_GET['order_id'];
        $payment = DB::table('payment')->where('is_del',1)->get();
        return view('pay/buy_pay',compact('order_id','payment'));
    }
    //构面执行
    public function buy_pay_do()
    {
        $data = request()->all();
        //dd($data);
        $response = Order::where('order_id',$data['order_id'])->update(['pay_id'=>$data['pay_id'],'pay_status'=>1]);

        if ($response){
            echo "<script>alert('购买成功');location.href='/buy/car';</script>";
        }else{
            echo "<script>alert('购买失败');location.href='/buy/car';</script>";
        }
    }
}
