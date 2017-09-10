 <?php
 require 'header.php';
 $string = '用户评论';
 $href="showcomment.php";
 require 'commonbody.php';
 ?>
 <div class="widget-body">
   <table class="table table-striped table-bordered table-advance table-hover">
    <thead>
      <tr>
      <th>id</th>
        <th><i class="icon-bullhorn"></i>用户ID(aid)</th>
        <th class="hidden-phone"><i class="icon-question-sign"></i>评论内容</th>
        <th><i class="icon-bookmark"></i> 发表时间</th>
        <th><i class=" icon-edit"></i>评论博客id(parentid)</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
     <form action="showcomment.php" method="get">
      <input type="hidden" name="sort" value = "<?=$_GET['sort']?>">
      <select id="myselect"  name="keywords" >
        <option value='id' >id</option>
        <option value='aid' <?= $_GET['keywords']=="aid"?" selected":"" ?>>aid</option>
        <option value='parentid' <?= $_GET['keywords']=="parentid"?" selected":"" ?>>parentid</option>
      </select>
      <input type="text" value="<?=$_GET['keyvalue']?>" placeholder="请输入数字或中文..." id='myinput' name="keyvalue">
      <input id='mybtn_serch' class="btn" style="position: relative;top:-5px;left:10px;" type="submit" value='搜索'>
    </form>
    <?php
    $page = ($_GET['page']>1?$_GET['page']:1);
    $pagenum = 10;
    $where = '1=1';
    if($_GET["keywords"]&&$_GET['keyvalue']){
      $key = $_GET["keywords"];
      $value = $_GET['keyvalue'];
      if(!is_numeric($value)){
          // $value = '"'.$value.'"';
        $where = '1=1'.' AND '.$key.' LIKE "%'.$value.'%"';
      }else{
        $where.= ' AND '.$key.'='.$value.'';
      }
    }
    $start = ($page-1)*$pagenum;
    $row = $mysql->selectData('comment','count(*) AS nums',$where,'addtime DESC');
    $totalpage  = ceil($row[0]['nums']/$pagenum);
    $result = $mysql->selectData('comment','*',$where,'addtime DESC',$start,$pagenum);
    foreach ($result as $k => $v) {

      echo ' <tr>
      <td>'.$v['id'].'</td>
      <td>'.$v['aid'].'</td>
      <td class="hidden-phone"><textarea rows="1" cols="1" >'.$v['content'].'</textarea></td>
      <td><span class="label label-mini">'.$v['addtime'].'</span></td>
      <td><span class="label label-mini">'.$v['parentid'].'</span></td>
      <td>
       <button class="btn btn-danger delete" name="delete" value="'.$v['id'].'" index="'.$_GET['sort'].'"><i class="icon-trash "></i></button>
     </td>
   </tr>';
 }
 ?>
</tbody>
</table>
</div>
<div id="btn_page">
  <a href="showcomment.php?page=1" >首页</a>
  <?php 
  if($page>1){
    echo '<a href="showcomment.php?page='.($page-1).'">上页</a>';
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
  echo '<a href="showcomment.php?page='.($page+$i).'" >'.($page+$i).'</a>';
}
?>
<a href="showcomment.php?page=<?=$page?>" id="mypage"><?=$page?></a>
<?php
for ($i=1; $i<3 ; $i++) { 
 if($i+$page>$totalpage){
  break;
}
echo '<a href="showcomment.php?page='.($page+$i).'">'.($page+$i).'</a>';
}
?>
<?php
if($page<$totalpage){
  echo '<a href="showcomment.php?page='.($page+1).'">下一页</a>';
}
?>
<a href="showcomment.php?page=<?=$totalpage?>" >尾页</a>
</div>
</div>
<!-- END BASIC PORTLET-->
</div>
</div>

<!-- END ADVANCED TABLE widget-->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->  
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<?php 
require 'footer.php';
?>
<script src="handl.js"></script>
<script>
  $('#mypage').css('background','#CCCCCC');
  $('#btn_page').on('mouseenter','a',function () {
    $(this).addClass('change_background');
  });
  $('#btn_page').on('mouseleave','a',function () {
    $(this).removeClass('change_background');
  })
</script>