<?php
//命名空间
namespace core;

//引入全局空间类,PDO三类
use \PDO,\PDOException,\PDOStatement;

//封装成类
/**
 * @param1 array()  $info   初始化函数传值{
 * -------------------------------------
 *@param1[1] string  $type     数据库类型
 *@param1[2] string  $host     主机地址   
 *@param1[3] int     $port     端口号
 *@param1[4] string  $user     用户名
 *@param1[5] string  $pass     密码
 *@param1[6] string  $dbname   数据表
 *@param1[7] string  $charset  编码格式
 * --------------------------------------
 * @param2  array   $drivers   PDO错误机制
 * 
 * 使用案例
 *  写入
 *  .dao_exec($sql);
 *  获取自增长id
 *  .dao_insert_id()
 * ---------------------
 *  查询
 *  .my_query($sql,[$only])
 *  $only默认单行,多行需传入false
*/
    class PDO_MySQL{
        //属性
        private $pdo;
        private $fetch_mode;
        //初始化
        public function __construct($info=array(),$drivers = array()){
            $type =$info['type']??'mysql';
            $host = $info['host']??'localhost';
            $port = $info['port']??'3306';
            $user = $info['user']??'root';
            $pass = $info['pass']??'root';
            $dbname = $info['dbname']??'my_date';
            $charset = $info['charset']??'utf8';
            //fetchmode不能再初始化的时候实现,需要在得到PDOsratement类对象设置
            $this->fetch_mode = $info['fetch_mode']??PDO::FETCH_ASSOC;
            //控制属性
            $driver[PDO::ATTR_ERRMODE] = $drivers[PDO::ATTR_ERRMODE]?? PDO::ERRMODE_EXCEPTION;

            //连接认证
            try{
                //增加错误抑制符
                $this->pdo = @new PDO($type.':host='.$host.';port='.$port.';dbname='.$dbname,$user,$pass,$driver);
            }catch(PDOException $e){
                echo '连接数据库错误<br/>';
                $this->PDO_error($e);
            }
            //设定字符集
            try{
                // exit($charset);
                $this->pdo->exec("set names {$charset}");
            }catch(PDOException $e){
                echo '字符集错误<br/>';
                $this->PDO_error($e);
            }
        
        }
        //封装错误报告
        public function PDO_error(PDOException $e){
            echo '错误文件'.$e->getFile().'<br/>';
            echo '错误行'.$e->getLine().'<br/>';
            echo '错误描述'.$e->getMessage().'<br/>';
            die();
        }

        //写入操作
        public function dao_exec($sql){
            try{
                return $this->pdo->exec($sql);
            }catch(PDOException $e){
                echo 'SQL错误<br/>';
                $this->PDO_error($e);
            }
        }
        //获取写入的自增长ID
        public function dao_insert_id(){
            return $this->pdo->lastInsertId();
        }
        
        //读取操作
        public function my_query($sql,$only = true){
            try{
                $stmt = $this->pdo->query($sql);
                //设置fetch_mode
                $stmt->setFetchMode($this->fetch_mode);
                //默认单例
                if($only){
                    $row = $stmt->fetch($this->fetch_mode);
                    if(!$row) throw new PDOException('当前查询数据不存在');
                    return $row;
                }else{
                    $rows = $stmt->fetchAll($this->fetch_mode);
                    if(!$rows) throw new PDOException('当前查询数据不存在');
                    return $rows;
                }
            }catch(PDOException $e){
                echo 'SQL错误<br/>';
                $this->PDO_error($e);
            }
        }
    }
    ?>