<?php
//引入配置文件  
require_once './config/common.php';

//设置时间戳为上海时间
date_default_timezone_set('Asia/Shanghai');

//载入网站首页
header('Refresh:0;./php/FceBook.php');

?>