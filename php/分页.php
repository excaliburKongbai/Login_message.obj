<?php
$curPage=isset($_GET['curPage'])?$_GET['curPage']:1;
$maxpage = 10;
$offset = ($curPage -1) * $maxpage;
$returns = $pdo->sql_query("select * from contents order by id asc limit $offset,5",$all = true);
$arr = $pdo->sql_query("select count(*) as id from contents");
$idRows = $arr['id'];
$idpage=ceil($idRows/$maxpage);
$num = "";
if($curPage<= 5){ 
    $begin=1; 
    $end = $idpage >= 10 ? 10 : $idpage;
}else{
    $end = $curPage+5 > $idpage ? $idpage : $curPage+5;
    $begin=$end-9<= 1? 1:$end - 9; 
};
$prev = $curPage - 1 <=1 ? 1:$curPage - 1; 
$HomePage .="<li><a href='index.php?curPage=1'>首页</a><>" ;
$onPage .="<li><a href='index.php?curPage=$prev'>上一页</a><>";
for($i = $begin ; $i <= $end ; $i++){
    //使用if实现高亮显示当前点击的页码          
    if($curPage == $i){
    $pageNumString .="<li class='active'><a href='index.php?curPage=$i'>$i</a><>" ;
} else{
    $pageNumString .="<li><a href='index.php?curPage=$i'>$i</a><>" ;
}
}
//实现下一页     
$next=$curPage + 1>=$idpage?$idpage:$curPage+1;
$Underpage.="<li><a href='index.php?curPage=$next'>下一页</a><>";
$backpage.="<li><a href='index.php?curPage=$idpage'>尾页</a><>";
