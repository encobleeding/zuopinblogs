<?php
require 'header.php';
$string = "博客内容";
$href = "showblogs.php";
require 'commonbody.php'; 
?>
<div class="widget-body">
  <table class="table table-striped table-bordered table-advance table-hover">
    <thead>
      <tr>
      <th>id</th>
        <th><i class="icon-bullhorn"></i>用户ID</th>
        <th>标题</th>
        <th class="hidden-phone"><i class="icon-question-sign"></i> 内容</th>
        <th><i class="icon-bookmark"></i> 发表时间</th>
        <th><i class=" icon-edit"></i> 账号</th>
        <th>修改时间</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <form action="showblogs.php" method="get">
        <input type="hidden" name="sort" value = "<?=$_GET['sort']?>">
        <select id="myselect"  name="keywords" >
          <option value='id' >id</option>
          <option value='aid' <?= $_GET['keywords']=="aid"?" selected":"" ?>>aid</option>
          <option value='username' <?= $_GET['keywords']=="username"?" selected":"" ?>>username</option>
          <option value='title' <?= $_GET['keywords']=="title"?" selected":"" ?>>title</option>
          <option value='views' <?= $_GET['keywords']=="views"?" selected":"" ?>>views</option>
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
      $row = $mysql->selectData('blogs','count(*) AS nums',$where,'addtime DESC');
      $totalpage  = ceil($row[0]['nums']/$pagenum);
      $result = $mysql->selectData('blogs','*',$where,'addtime DESC',$start,$pagenum);
      foreach ($result as $k => $v) {
       
      echo ' <tr>
      <td>'.$v['id'].'</td>
        <td>'.$v['aid'].'</td>
        <td>'.str_replace($_GET['keyvalue'], '<span style="color:red;">'.$_GET['keyvalue'].'</span>', $v['title']).'</td>
        <td class="hidden-phone"><textarea rows="1" cols="1" >'.$v['content'].'</textarea></td>
        <td>'.$v['addtime'].'</td>
        <td><span class="label label-mini">'.$v['username'].'</span></td>
        <td>'.$v['updatetime'].'</td>
        <td>
         <button class="btn btn-danger delete" name="delete" value="'.$v['id'].'" index="'.$_GET['sort'].'"><i class="icon-trash "></i></button>
         </td>
       </tr>';
        }
        ?>
     </tbody>
   </table>
 </div>
 <?php
 require 'btn_page.php';
 ?>
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