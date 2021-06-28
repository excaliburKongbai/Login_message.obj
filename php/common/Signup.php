<?php
//载入配置
use core\PDO_MySQL;
require_once '../../config/common.php';
//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

// 开启用户会话
session_start();

//设置默认值
$flag = 0;
$data = $_POST;
//判断传入值
$logid=isset($_POST['name'])?trim($_POST['name']):'';  //user账户
$pass=isset($_POST['pwd'])?trim($_POST['pwd']):''; //user密码
$word = isset($_SESSION["word"])?trim($_SESSION["word"]):''; //后端验证码
$captcha = isset($_POST["captcha"])?trim($_POST["captcha"]):'';//用户验证码

if($logid==''||$pass==''){
    $msg = "用户名或密码不能为空";
}else if($captcha !== $word){
    $msg = '验证码错误';
}else{
    $sql = "SELECT*FROM `user` WHERE user_id ='$logid'";
    $reds = $user->my_query($sql);
    $red = isset($reds['user_id'])??'';
    if($red==$logid){
        //判断用户是否存在
        $msg = "用户已存在";
    }else{
        $flag = 1;
        $sql = "INSERT INTO `user` (user_id,user_pass)VALUES('$logid','$pass')";
        $user->dao_exec($sql);
        $msg ='注册成功';
        setcookie("user_id",$logid,time()+60*60,'/');//加"/"不然跨目录找不 
        $id = $user ->dao_insert_id();
        setcookie("id",$id,time()+60*60,'/');
    }
}
//打包数据
$respose=[
    'flag'=>$flag,
    'msg'=>$msg,
];
echo json_encode($respose);
?>