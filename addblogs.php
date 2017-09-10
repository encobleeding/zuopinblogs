<?php
  require './common/session.php';
  require './common/admin_common.php';
  // var_dump($_POST);
  // exit;
  if($_POST['id']){
    // var_dump($_POST);
    // var_dump(1111);
    //exit;
    $_POST['aid'] = $mysql->getOneData('user','id','account = "'.$_SESSION['account'].'"')['id'];
    $_POST['username'] = $mysql->getOneData('user','username','account = "'.$_SESSION['account'].'"')['username'];
    $_POST['addtime'] = date('Y-m-d H:i:s');

    $re=$mysql->updateData('blogs',$_POST,'id ='.$_POST['id']);
    // var_dump($re);
    // exit;
    $arr = array();
    $arr['id'] = $mysql->getOneData('blogs','id',' title ="'.$_POST['title'].'"')['id'];
    echo json_encode($arr);
  }else{
    // var_dump(222);
    // exit;
    $_POST['aid'] = $mysql->getOneData('user','id','account = "'.$_SESSION['account'].'"')['id'];
    $_POST['username'] = $mysql->getOneData('user','username','account = "'.$_SESSION['account'].'"')['username'];
    $_POST['addtime'] = date('Y-m-d H:i:s');
    $mysql->insertData('blogs',$_POST);
    $arr = array();
    $arr['id'] = $mysql->getOneData('blogs','id',' title ="'.$_POST['title'].'"')['id'];
    //var_dump($arr['id']);
    echo json_encode($arr);
  }
