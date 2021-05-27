<?php
//载入配置
use core\PDO_MySQL;
require_once '../config/common.php';
//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();


//连接修改函数
require_once 'common\Update_Data.php';
use Update_one\Update;

use function PHPSTORM_META\type;

$Update = new Update($user);

//默认值
$flag = 0;

// 开启用户会话
session_start();

//获取传入的id
$new_text =isset($_POST['new_text'])?$_POST['new_text']:'';
$text_id =isset($_POST['text_id'])?$_POST['text_id']:'';

//判断新旧是否一致
//查询原密码和数据库的是否正确
$sql = "SELECT * FROM `my_message` WHERE `id` LIKE {$text_id} AND `user_Message` LIKE '{$new_text}' ";
$row = $user->my_query($sql);
if($row == true){
    $msg = "Error:无效操作！修改不能与原文相同";
    $Update->Ajax_return($flag,$msg);
    exit;
}

//修改
$row = $Update->Upuser_pass('my_message',$text_id,'user_Message',$new_text);

if($row){
    $flag = 1;
    $msg = "修改成功";
    $Update->Ajax_return($flag,$msg);
}else{
    $msg = "修改失败";
    $Update->Ajax_return($flag,$msg);
}



?>