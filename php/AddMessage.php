<?php
//载入配置
use core\PDO_MySQL;
//导入通用地址
require_once '../config/common.php';
//链接数据库
require_once MySQL_ROOT.'mysql_user.php';

// 初始化数据
$flag = 0;

$user_text=isset($_POST['user_text'])?trim($_POST['user_text']):'';
$user_id=isset($_POST['user_id'])? trim($_POST['user_id']):'';

//封装Ajax返回值
function Ajax_return($flag,$msg){
    //打包数据
    $respose=[
            'flag' => $flag,
            'msg' => $msg
    ];
    echo json_encode($respose);
}

//判断用户是否登录
if($user_id ==''){
    $msg = '请登录'; 
    Ajax_return($flag,$msg);
    exit();
}

//判断内容是否为空
if($user_text ==''){
    $msg = '留言不能为空'; 
    Ajax_return($flag,$msg);
    exit();
}
//执行插入
$user = new PDO_MySQL();
$sql = "INSERT INTO `my_message`(`my_user`,`user_Message`,`time`)VALUES('$user_id','$user_text',CURRENT_TIMESTAMP)";
$red = $user->dao_exec($sql);
if(!isset($red)){
    $msg = '插入失败'; 
    Ajax_return($flag,$msg);
    exit();
}else{
    $flag = 1;
    $msg = '插入成功'; 
    Ajax_return($flag,$msg);
    exit();
}


?>