<?php
/**
 * 获取当前文件的根目录并且返回指定路径
 * @return ROOT        当前文件根目录
 * @return CSS_ROOT    css文件根目录
 * @return HTML_ROOT   html文件目录
 * @return MySQL_ROOT  数据库根目录
 * @return PHP_ROOT    php文件根目录
 * @return IMAGES_ROOT 图片根目录
 * @return JS_ROOT     js文件根目录
 * @return REPORT_ROOT 日志文件目录
 */
define('ROOT',substr(str_replace('\\','/',__DIR__),0,-6));  
define('CSS_ROOT',ROOT.'css'.'/');
define('HTML_ROOT',ROOT.'html'.'/');
define('MySQL_ROOT',ROOT.'MySQL'.'/');
define('PHP_ROOT',ROOT.'php'.'/');
define('IMAGES_ROOT',ROOT.'images'.'/');
define('JS_ROOT',ROOT.'js'.'/');
define('REPORT_ROOT',ROOT.'Report'.'/');

/**
 * 获取公共文件地址
 * @return PHP_COMMON_ROOT      php公共模板根目录
 * @return IMAGES_COMMON_ROOT   图片公共模板根目录
 */
define('PHP_COMMON_ROOT',PHP_ROOT.'common'.'/');
define('IMAGES_COMMON_ROOT',IMAGES_ROOT.'common'.'/');




?>