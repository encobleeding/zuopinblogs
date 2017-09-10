<?php
// require './common/session.php';
// require 'common/admin_common.php';
if($_POST){
	$pagenum = 10;
	$page = $_POST?$_POST['page']:1;
	$result = $mysql->getOneData('blogs','*','id='.$_GET['id']);
	$rows = $mysql->selectData('comment','count(*) AS nums','parentid='.$_GET['id']);
	$totalpage = ceil($rows[0]['nums']/$pagenum);
	$result2 = $mysql->selectData('comment','*','parentid='.$_GET['id'],'id desc',$pagenum*($page-1),$pagenum);

	$arr = array();
	foreach ($result2 as $key => $value) {
		$arr[] = $value;
	}
	$arr['totalpage']=$totalpage;
	echo json_encode($arr);

}else{
	$pagenum = 10;
	$page =1;
	$result = $mysql->getOneData('blogs','*','id='.$_GET['id']);
	$rows = $mysql->selectData('comment','count(*) AS nums','parentid='.$_GET['id']);
	$totalpage = ceil($rows[0]['nums']/$pagenum);
	$result2 = $mysql->selectData('comment','*','parentid='.$_GET['id'],'id desc',0,$pagenum);
	// var_dump($result2):
	// exit;
}
