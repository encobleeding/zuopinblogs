<?php
require 'common/admin.common.php';
$arr=[];
if($_POST['id']==1){
	$result = $mysql->selectData('blogs','id,title','ad = "t"');
	foreach ($result as $k => $v) {
		$arr[] = $v;
	}
}
if($_POST['id']==2){
	$mysql->updateData('blogs',array("ad"=>"f"),'1=1');
}
echo json_encode($arr);
