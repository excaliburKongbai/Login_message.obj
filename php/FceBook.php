<?php
//载入配置

use core\PDO_MySQL;

require_once '../config/common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

// 查询所有数据并且遍历显示
$sql = "SELECT * from `my_message`";
$reds =$user->my_query($sql,false);

//存储数据库数组
$naws = array(); 
$name = array();

for($i=0;$i<count($reds);$i++){
    $naws[]=$reds[$i];
    // for($k=0;$k<count($naws);$k++){
    //     $name[]=$naws[$k];
    // }
    var_dump($naws);
}

echo '<pre>';

// var_dump($reds);
// echo count($reds);

//载入html文件
// require_once HTML_ROOT.'FceBook.html';

?>