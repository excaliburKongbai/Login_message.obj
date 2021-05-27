<?php
//载入配置
use core\PDO_MySQL;
//文件地址
require_once '../config/common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();
session_start();
//传进来的是文章id
$id =isset($_GET['id'])?trim($_GET['id']):'';

// //查找用户 以文章作者的名字去user找到相同名字的并且返回id值 (跳转个人信息页面1)
// $sql = "SELECT `my_user` FROM `my_message` WHERE `my_message`.`id` = {$id} ";
// $rows = $user->my_query($sql);
// $my_user = $rows['my_user'];
// //查找用户对应的id
// $sql = " SELECT `id` FROM `user` WHERE `user`.`user_id` = {$my_user}";
// $rows = $user->my_query($sql);
// $user_id = $rows['id'];

// //执行删除
$sql = "DELETE FROM `my_message`  WHERE `my_message`.`id` = {$id} ;";
$row = $user->dao_query($sql);

// if($row){   (跳转个人信息页面2)
//     echo "<script type='text/javascript'>alert('删除成功');</script>";
//     header('Refresh:0;user_Details.php?id='."$user_id");
// }else{
//     echo "<script type='text/javascript'>alert('删除失败');</script>";
//     header('Refresh:0;user_Details.php?id='."$user_id");
// }

if($row){
    echo "<script type='text/javascript'>alert('删除成功');</script>";
    header('Refresh:0;../index.php');
}else{
    echo "<script type='text/javascript'>alert('删除失败');</script>";
    header('Refresh:0;../index.php');
}




?>