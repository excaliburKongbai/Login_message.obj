<?php
//载入配置
use core\PDO_MySQL;
//文件地址
require_once '../config/common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

//开启会话并且获取当前用户打id
session_start();
$id = $_GET['id'];

//······输出当前用户的留言板······
//以id查出名字
$sql = "SELECT `user_id` from `user` WHERE id = '{$id}' ";
$rows = $user->my_query($sql);
$my_user = $rows['user_id'];
//用名字遍历出数据
$sql = "SELECT * from `my_message` WHERE my_user = '{$my_user}'";
$reds =$user->my_query($sql,false);

// 引入后端
require_once HTML_ROOT.'user_Details.html';



?>