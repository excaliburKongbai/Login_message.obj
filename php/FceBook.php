<?php
//载入配置

use core\PDO_MySQL;

require_once 'D:\loliyaozi\loliyaozi\config\common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

// 查询所有数据并且遍历显示
$sql = "SELECT * from `my_message`";
$reds =$user->my_query($sql,false);

// 开启用户会话
session_start();


// var_dump($_SESSION);

//载入html文件
require_once HTML_ROOT.'FceBook.html';

?>