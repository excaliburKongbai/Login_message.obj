<?php
//载入配置

use core\PDO_MySQL;

require_once './config/common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

//获取登录页面的内容
if($_POST){
    $logid=isset($_POST['user_id'])?trim($_POST['user_id']):'';  //user账户
    $pass=isset($_POST['user_pass'])?trim($_POST['user_pass']):''; //user密码
    // 测试获取id和pass
    echo $logid,$pass; 

    //导出数据库的账号密码
    $sql="SELECT*FROM `user` WHERE name='$logid'";
    $result = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    //var_dump($row);
    $Name=$row['name'];
    $Email=$row['time'];
    $Pas=$row['Password'];
    //与数据库比对账号密码是否错误
    $new;
    if(!$logid&&!$pass){
        $new=1;
        echo "<script>alert('账号不存在')</script>";
    }else if($logid==$Name&&$pass==$Pas){
            //cookie会话
            setcookie("Email",$Email,time()+60*60,'/');//加"/"不然跨目录找不到
            setcookie("name",$Name,time()+60*60,'/');
            //header("Refresh:0;/html/The header.html");
            // header("Refresh:0;/html/The header.php");
            // echo "<script>alert('欢迎回来')</script>";
            $new=0;
            echo "<script>alert('欢迎回来')</script>";
        }else{
            $new=1;
            echo "<script>alert('密码错误')</script>";
        };

    //保存用户账号在本地
}
//载入html文件
require_once HTML_ROOT.'FceBook_index.html';

?>