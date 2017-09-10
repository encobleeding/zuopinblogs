<?php
require './common/session.php';
require './common/common.php';
	if($_POST['tel']){
		$r = $mysql->updateData('user', array('tel'=>''), 'account= "'.$_SESSION['account'].'"');
		if($r){
       $result['result']='true';
   	 	}
		echo json_encode($result);
		exit;
	}
	if($_POST['email']){
		$r = $mysql->updateData('user', array('email'=>''), 'account= "'.$_SESSION['account'].'"');
		if($r){
       $result['result']='true';
   	 	}
		echo json_encode($result);
		exit;
	}
