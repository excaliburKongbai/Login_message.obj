<?php
namespace Update_one;

class Update{
    private $pdo_user;
    //连接数据库引入PDO
    public function __construct($user){
        $this->pdo_user = $user;
    }
    
    //导出内容
    public function Ajax_return($flag,$msg){
        //打包数据
        $respose=[
            'flag' => $flag,
            'msg' => $msg
        ];
        echo json_encode($respose);
    }

    /**
     * 修改
     *  @param1[]  $Table = 表名 
     *  @param1[]  $id    = 被修改的id 
     *  @param1[]  $type  = 被修改的目标(密码，内容等)
     *  @param1[]  $new   = 新的内容
     **/ 
    public function Upuser_pass($Table,$id,$type,$new){
        $sql = "UPDATE `{$Table}` SET {$type} = '{$new}' WHERE `{$Table}`.`id` = {$id} ;";
        return $this->pdo_user->dao_query($sql);
    }
}