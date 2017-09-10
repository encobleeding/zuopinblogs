<?php
require 'common/admin.common.php';
if($_POST['n']==1){
	$mysql->updateData('blogs',array("ad"=>"t"),'id='.$_POST['id']);
}
if($_POST['n']==2){
	$mysql->updateData('blogs',array("ad"=>"f"),'id='.$_POST['id']);
}
$arr=array();
if($mysql){
	$arr['r']='success';
}else{
	$arr['r']='fail';
}
echo json_encode($arr);