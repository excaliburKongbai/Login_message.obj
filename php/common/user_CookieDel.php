<?php
//让会话过期
//隐藏错误报告，因为判断错误的图片跳回源网站会弹出来不好看（测试可以注释掉）
error_reporting(0);
setcookie("user_id",$user_id,time()-60*60,'/');//加"/"不然跨目录找不到
setcookie("user_pass",$user_pass,time()-60*60,'/');
header("Refresh:0;../../../index.php");
?>