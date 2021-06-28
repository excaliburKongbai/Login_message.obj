<?php
// 载入配置
use core\PDO_MySQL;
require_once '../../config/common.php';
//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();
//开启会话
session_start();
//传入格式
$data=$_POST;
//验证值
$flag=0;
$logid=isset($_POST['name'])?trim($_POST['name']):'';  //user账户
$pass=isset($_POST['pwd'])?trim($_POST['pwd']):''; //user密码


if($logid==''||$pass==''){
    $msg = "用户名或密码不能为空";
}else{
    //导出数据库的账号密码
    $sql="SELECT*FROM `user` WHERE user_id ='$logid'";
    $reds = $user->my_query($sql);
    $red = isset($reds['user_id'])??'';
    if($red ==''){
        //判断用户是否存在
        $msg = "用户名不存在";
    }else{
        $id=$reds["id"];
        $user_id=$reds["user_id"];
        $user_pass=$reds["user_pass"];
        //判断登录
        if($data['name']==$user_id && $data['pwd']==$user_pass) {
            $flag=1;
            $msg="登录成功";
            setcookie("user_id",$user_id,time()+60*60,'/');//加"/"不然跨目录找不到
            setcookie("user_pass",$user_pass,time()+60*60,'/');
            setcookie("id",$id,time()+60*60,'/');
        }else{
            $msg="密码错误";
        }
    }
}
//打包数据
$respose=[
    'flag'=>$flag,
    'id'=>$logid,
    'pass'=>$pass,
    'msg'=>$msg,
];
echo json_encode($respose);

?>