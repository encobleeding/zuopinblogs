<?php
require 'common/common.php';
$_POST['addtime'] = date('Y-m-d H:i:s');
$mysql->insertData('comment',$_POST);
$arr = array();
 $arr['r'] = $_POST['addtime'];
 $arr['username'] = $mysql->getOneData('user','username','id='.$_POST['aid'])['username'];
 $arr['img'] = $mysql->getOneData('user','img','id='.$_POST['aid'])['img'];
echo json_encode($arr);
//exit;
