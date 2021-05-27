<?php
//载入配置

use core\PDO_MySQL;

require_once '../config/common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

// 开启用户会话
session_start();

//获取传入的id
$id =isset($_GET['id'])?$_GET['id']:'';

// 查询所有数据并且遍历显示
$sql = "SELECT * from `my_message` WHERE `id` = {$id} ";
$reds =$user->my_query($sql);


//载入html文件
require_once HTML_ROOT.'Update_text.html';


?>