<?php
//载入配置地址
require_once '../config/common.php';
//链接数据库
use core\PDO_MySQL;
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

//连接修改函数
require_once 'common\Update_Data.php';
use Update_one\Update;
$Update = new Update($user);

//默认值
$flag = 0;

//获取
$id=isset($_POST['id'])?trim($_POST['id']):'';
$Old_pass=isset($_POST['Old_pass'])?trim($_POST['Old_pass']):'';  //旧密码
$new_pass=isset($_POST['new_pass'])?trim($_POST['new_pass']):''; //新密码

//查询原密码和数据库的是否正确
$sql = "SELECT * FROM `user` WHERE `id` LIKE {$id} AND `user_pass` LIKE '{$Old_pass}' ";
$row = $user->my_query($sql);
if($row ==''){
    $msg = "原密码错误";
    $Update->Ajax_return($flag,$msg);
    exit;
}
$row = $Update->Upuser_pass('user',$id,'user_pass',$new_pass);
if($row = true){
    $flag = 1;
    $msg = "修改成功";
    $Update->Ajax_return($flag,$msg);
}

?>