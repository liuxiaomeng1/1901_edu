<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Class1 extends Model
{
    public $timestamps=false;
    protected $table="category";
    protected $paimarykey='cate_id';

    public static function file_add($file)
    {
        //文件上传是否错误
        if($file['error'] != 0){
            echo json_encode(['code'=>201,'msg'=>"文件上传异常"]);die;
        }
//文件上传类型 大小
        if($file['size'] > 1024*1024*2 ){
            echo json_encode(['code'=>202,'msg'=>"文件超出限制大小"]);die;
        }
        $allow_type = ['image/png','image/jpg','image/gif','image/jpeg'];
        if(!in_array($file['type'],$allow_type)){
            echo json_encode(['code'=>203,'msg'=>"文件超出限制大小"]);die;
        }
//$det = "1.jpg";    //移动后文件路径
        $date = date("Y-n-j");  //2019-8-6
        if(!file_exists("img/".$date)){  //如果文件夹不存在
            mkdir("img/".$date,'777');  //创建日期目录
        }
        $name = $file['name'];  //'xxx.jpg'
        $ext = pathinfo($name,PATHINFO_EXTENSION);//得到后缀名
        $det = "img/".$date."/".md5(time().rand(1000,9999)).'.'.$ext;   //md5(uniqid(microtime(),true));
//移动文件 从临时文件 移动到目标地址
        $res = move_uploaded_file($file['tmp_name'],$det);
        return $det;
    }
}
