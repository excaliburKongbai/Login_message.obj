<?php
//载入配置

use core\PDO_MySQL;

require_once '../config/common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

//获取点击页码
$Page=$_GET["Page"]??1;

//获取数据一共有多少跳
$sql = "SELECT count(*) FROM `my_message`";
$rows=$user->my_query($sql);
// 获取到了总条数
$Total_text = $rows["count(*)"];
$Total_Pages = ceil($Total_text/5);
// 判断是否超出范围
if($Page>$Total_Pages){
    $Page = $Total_Pages;
}
if($Page<1){
    $Page = 1;
}

//算出点击页码指定的页数
$start =($Page-1)*5;

// 查询所有数据并且遍历显示
$sql = "SELECT * from `my_message` limit {$start},5 ";
$reds =$user->my_query($sql,false);

// 开启用户会话
session_start();

//默认id
$id =isset($_COOKIE['id'])?$_COOKIE['id']:'';
 
//载入html文件
require_once HTML_ROOT.'FceBook.html';

?>