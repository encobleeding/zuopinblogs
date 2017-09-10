<?php
$blogs = 5;
if($_POST['click_num']){
  require './common/common.php';
}

$blogs_list = $mysql->selectData('blogs','*','',' addtime DESC ',0,$blogs);
// var_dump(22111);
// exit;
if($_POST){
  $num = (int)$_POST['click_num'] * $blogs;
  $blogsnum = $mysql->selectData('blogs',' count(*) AS nums ','');
  // var_dump($blogsnum);
  // exit;
  $blogspage = ceil((int)$blogsnum[0]['nums']/$blogs);
  // var_dump($blogspage);
  // exit;
  //var_dump($_POST['click_num']);
  $blogs_list = $mysql->selectData('blogs','*','',' addtime DESC ',$num,$blogs);
  foreach($blogs_list as $k=>$val){
    $blogs_list[$k]['headimg'] = $mysql->getOneData('user','img','id='.$val['aid'])['img'];
    $blogs_list[$k]['username'] = $mysql->getOneData('user','username','id='.$val['aid'])['username'];
  }
  $blogs_list[0]['blogspage'] = $blogspage;
  echo json_encode($blogs_list);
}
