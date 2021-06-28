<?php
session_start();                                    //启动超全局变量
header('Content-type:image/jpeg',);                 //声明浏览器输出格式
$width=120;                                         //声明宽
$height=40;                                         //声明高
//声明字体 php7 以上需要绝对路径而且不能有中文
$font='C:\WINDOWS\FONTS\SIMKAI.TTF';

//声明数组字符串
$arr=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r',
's','t','u','w','x','y','z','1','2','3','4','5','6','7','8','9');

//获取随机字符的验证码
$word='';

//生成验证码
for($i=0;$i<5;$i++){
    $word.=$arr[rand(0,count($arr)-1)];
}

$img=imagecreatetruecolor($width,$height);          //创建画布并且套用宽高
//声明背景随机数的颜色RGB
$color_Bg=imagecolorallocate(                                          
    $img,rand(200,255),rand(200,255),rand(200,255)                     
);//rand(x，y)x-y的随机函数

//声明边框的随机颜色  
$color_Border=imagecolorallocate(                                      
    $img,rand(100,200),rand(100,200),rand(100,200)
);  
//声明背景噪点颜色  
$color_Xs=imagecolorallocate(                                      
    $img,rand(0,50),rand(0,50),rand(0,50)
);
//声明背景线条颜色  
$color_Xt=imagecolorallocate(                                      
    $img,rand(10,150),rand(10,150),rand(10,150)
);
//声明颜色  
$color_Zt=imagecolorallocate(                                      
    $img,rand(10,50),rand(10,50),rand(10,50)
);
imagefill($img,0,0,$color_Bg);                                //从0.0开始输出并套用颜色
imagerectangle($img,0,0,$width-1,$height-1,$color_Border);    //绘画边框
//循环随机数量的噪点
for($i=0;$i<=rand(150,200);$i++){                                         
    imagesetpixel($img,rand(0,$width-1),rand(0,$width-1),$color_Xs);
}
//绘画线条
for($i=0;$i<=rand(1,3);$i++){
    imageline($img,rand(0,$width/2),rand(0,$height),rand($width/2,$width),rand(0,$height),$color_Xt);
}
//验证码字体
//imagestring($img,5,rand(10,100),rand(1,25),'abcd',$color_Zt); //不常用的验证码设置
imagettftext($img,20,rand(-4,4),rand(10,50),rand(28,35),$color_Zt,$font,$word);
        //1路径 2字体大小  3旋转角度   4x轴         5y轴        6颜色     
imagejpeg($img);                                             //输出图像
imagedestroy($img);                                          //释放缓存图像销毁
$_SESSION['word']=$word;                                     //超全局变量声明
?>