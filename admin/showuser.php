 <?php
 require 'header.php';
 $string = '注册用户';
 $href = 'showuser.php';
 require 'commonbody.php';
 ?>
 <div class="widget-body">
  <table class="table table-striped table-bordered table-advance table-hover">
    <thead>
      <tr>
        <th><i class="icon-bullhorn"></i>ID</th>
        <th class="hidden-phone"><i class="icon-question-sign"></i>用户名</th>
        <th><i class="icon-bookmark"></i> 注册账号</th>
        <th><i class=" icon-edit"></i>手机号码</th>
        <th><i class=" icon-edit"></i>最后登录时间</th>
        <th><i class=" icon-edit"></i>登录次数</th>
        <th>权限<th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
    <form action="showuser.php" method="get">
        <input type="hidden" name="sort" value = "<?=$_GET['sort']?>">
        <select id="myselect"  name="keywords" >
          <option value='id' >id</option>

          <option value='username' <?= $_GET['keywords']=="username"?" selected":"" ?>>username</option>
          <option value='account' <?= $_GET['keywords']=="account"?" selected":"" ?>>acount</option>
          <option value='tel' <?= $_GET['keywords']=="tel"?" selected":"" ?>>tel</option>
          <option value='blacklist' <?= $_GET['keywords']=="blacklist"?" selected":"" ?>>blacklist</option>
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
      $row = $mysql->selectData('user','count(*) AS nums',$where,'addtime DESC');
      $totalpage  = ceil($row[0]['nums']/$pagenum);
      $result = $mysql->selectData('user','*',$where,'addtime DESC',$start,$pagenum);
      foreach ($result as $k => $v) {

      echo ' <tr>
      <td>'.$v['id'].'</td>
        <td>'.str_replace($_GET['keyvalue'], '<span style="color:red;">'.$_GET['keyvalue'].'</span>', $v['username']).'</td>

        <td>'.$v['account'].'</td>
        <td><span class="label label-mini">'.$v['tel'].'</span></td>
        <td>'.$v['lasttime'].'</td>
        <td>'.$v['loginnum'].'</td>
        <td><input type="text" value="'.$v['blacklist'].'" class="blacklist_value" style="width: 10px;" index="'.$v['id'].'"></td>
        <td>
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
  <a href="showuser.php?page=1" >首页</a>
  <?php
  if($page>1){
    echo '<a href="showuser.php?page='.($page-1).'">上页</a>';
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
  echo '<a href="showuser.php?page='.($page+$i).'" >'.($page+$i).'</a>';
}
?>
<a href="showuser.php?page=<?=$page?>" id="mypage"><?=$page?></a>
<?php
for ($i=1; $i<3 ; $i++) {
 if($i+$page>$totalpage){
  break;
}
echo '<a href="showuser.php?page='.($page+$i).'">'.($page+$i).'</a>';
}
?>
<?php
if($page<$totalpage){
  echo '<a href="showuser.php?page='.($page+1).'">下一页</a>';
}
?>
<a href="showuser.php?page=<?=$totalpage?>" >尾页</a>
<button class='btn btn-success' style='float: right;margin-right: 40px;' id="btn-blacklist">确认修改</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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
  });
  $('#btn-blacklist').click(function() {

    var arrBig=[];
    $('.blacklist_value').each(function() {
      var arr = [];
      arr.push(parseInt($(this).val()));
      arr.push(parseInt($(this).attr('index')));
      arrBig.push(arr);
    });
    $.ajax({
      url: 'updata.php',
      type: 'POST',
      dataType: 'json',
      data: {param1: arrBig}
    })
  });
</script>
