<?php
  require './common/session.php';
  require './common/admin_common.php';
  //var_dump($_POST);
  //exit;
  $myid = $mysql->getOneData('user','id','account = "'.$_SESSION['account'].'"');
  if($_POST['follow'] == 'follow'){
    $mysql->addFollow($myid['id'],$_POST['id']);
  }else if($_POST['follow'] == 'notfollow'){
    $mysql->delFollow($myid['id'],$_POST['id']);
  }


  //$mysql->delFollow($myid['id'],$_POST['id']);
  //$arr = $mysql->numFollow($myid['id'],$_POST['id']);
