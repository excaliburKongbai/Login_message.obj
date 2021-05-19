<?php
//载入配置

use core\PDO_MySQL;

require_once './config/common.php';

//链接数据库
require_once MySQL_ROOT.'mysql_user.php';  
$user = new PDO_MySQL();

//载入html文件
require_once HTML_ROOT.'FceBook_Login.html';

?>