<?php
require './common/session.php';
require './common/common.php';
	//var_dump($_POST);
	unset($_POST['website']);

	$r = $mysql->updateData('user',  $_POST, 'account= "'.$_SESSION['account'].'"');

	if($r){
       	$row['result']='true';
   	 	}
		echo json_encode($row);
