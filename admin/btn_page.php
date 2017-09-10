<div id="btn_page">
    <a href="showblogs.php?page=1" >首页</a>
  <?php 
  if($page>1){
    echo '<a href="showblogs.php?page='.($page-1).'">上页</a>';
  }
  ?>
  <?php
  if($page>2){
    $a=-2;
  }else{
    $a=-1;
  }
  for ($i=$a; $page+$i>0&&$i<0; $i++) { 
   if($i+$page>$totalpage){
    break;
  }
  echo '<a href="showblogs.php?page='.($page+$i).'" >'.($page+$i).'</a>';
}
?>
<a href="showblogs.php?page=<?=$page?>" id="mypage"><?=$page?></a>
<?php
for ($i=1; $i<3 ; $i++) { 
 if($i+$page>$totalpage){
  break;
}
echo '<a href="showblogs.php?page='.($page+$i).'">'.($page+$i).'</a>';
}
?>
<?php
if($page<$totalpage){
  echo '<a href="showblogs.php?page='.($page+1).'">下一页</a>';
}
?>
<a href="showblogs.php?page=<?=$totalpage?>" >尾页</a>
</div>