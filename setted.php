<?php
	require './common/session.php';
	require './common/common.php';
		unset($_POST['editor']);
		unset($_POST['langu']);
		unset($_POST['who']);
		unset($_POST['verticle']);

	$ID=$mysql->selectData('user','id','account= "'.$_SESSION['account'].'"');
	$arr=array(); //可以不用定义直接赋值
	// var_dump($_SESSION['account']);
	// exit;
	if($_POST['email']){
	$email=$mysql->selectData('user', '*', 'id!="'.$ID[0]['id'].'" AND email="'.$_POST['email'].'"');
		if(!$email){
			$arr['email']='true';
		}else{
			$arr['email']='false';
			echo json_encode($arr);
			exit;
		}
	}

	if($_POST['tel']){

		$tel=$mysql->selectData('user', '*', 'id!="'.$ID[0]['id'].'" AND tel="'.$_POST['tel'].'"');
		if(!$tel){
			$arr['tel']='true';
		}else{
			$arr['tel']='false';
			echo json_encode($arr);
			exit;
		}
	}

	//更新全部的各人设置信息
	if(!$_POST['img']){
		unset($_POST['img']);
	}else{
		$img=$_POST['img'];
		$newimg=explode(',',$img);
		$_POST['img']=end($newimg);
		//var_dump($_POST['img']);
		//exit;
		}
		$r = $mysql->updateData('user',$_POST, 'account= "'.$_SESSION['account'].'"');
		if($r){
       $arr['result']='true';
   	 	}

		echo json_encode($arr);
