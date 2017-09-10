<?php
require 'common/admin.common.php';
$arr=array();
// var_dump($_POST['id']);
// exit;
if($_POST['id']){
	if($_POST['sort'] == 1||$_POST['sort'] == 4){
		$flml = 'blogs';
	}
	if($_POST['sort'] == 2){
		$flml = 'comment';
	}
	if($_POST['sort'] == 3){
		$flml = 'user';
	}
	$row = $mysql->deleteData($flml,'id='.$_POST['id']);
	// var_dump($row);
	// exit;
	$arr['r']='success';
}else{
	$arr['r']='fail';
};
echo json_encode($arr);
exit;
