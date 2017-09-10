<?php
  require './common/common.php';
  //echo '1111';
  //var_dump($_GET);

  $search_list = $mysql->selectData('blogs','*','title LIKE "%'.$_GET['search'].'%" OR content LIKE "%'.$_GET['search'].'%"',' addtime DESC ');

  $search_user_list = $mysql->selectData('user','*','username LIKE "%'.$_GET['search'].'%"','id ASC');

  $target_list = $mysql->getOneData('user','targetid','account = "'.$_SESSION['account'].'"');

  $tararr = explode(',',$target_list['targetid']);

  $myid = $mysql->getOneData('user','id','account = "'.$_SESSION['account'].'"');
