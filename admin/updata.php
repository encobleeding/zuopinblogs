<?php
require "common/admin.common.php";
 // var_dump($_POST);
 // exit;
if($_POST['id']){
	if($_POST['sort'] == 1||$_POST['sort'] ==4){
		$flml = 'blogs';
	}
	if($_POST['sort'] == 2){
		$flml = 'comment';
	}
	if($_POST['sort'] == 3){
		$flml = 'user';
	}
	$result = $mysql->updateData($flml,array('content'=>$_POST['content'],'img'=>$_POST['img'],'title'=>$_POST['title']),'id='.$_POST['id']);
};
if($_POST['param1']){
	// var_dump($_POST['param1']);
	// exit;
	foreach($_POST['param1']  as $k=>$v){
	 $mysql->updateData('user',array('blacklist'=>$v[0]),'id='.$v[1]);
	};
	$result = 'true';

}
$arr = array();
if($result){
	$arr['r']='success';

}else{
	$arr['r']='fail';
}
echo json_encode($arr);
