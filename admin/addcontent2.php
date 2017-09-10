<!-- 添加内容的php -->
<?php
require "common/admin.common.php";
$_POST['aid'] = 6;
$_POST['username'] = $_SESSION['realname'];
$_POST['class'] = 123;
$_POST['views'] = 1;
$_POST['addtime'] = date('Y-m-d H:i:s');
$_POST['updatetime'] = $_POST['addtime'];
$result = $mysql->insertData('blogs',$_POST);
$arr = array();
if($result){
	$arr['r'] = 'success';
}else{
	$arr['r'] = 'fail';
}
echo json_encode($arr);
