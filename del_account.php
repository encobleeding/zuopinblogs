<?php
require './common/session.php';
require './common/common.php';
	if($_POST['del']){
		$r = $mysql->delData('user','account= "'.$_SESSION['account'].'"');
		if($r){
       	$result['result']='true';
   	 	}
		unset($_SESSION['account']);
		echo json_encode($result);
		exit;
	}
