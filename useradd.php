<?php
	require './common/session.php';
	require './common/common.php';

	if(!$_POST["passwd"]){
		$row = $mysql->selectData("user", "account , id","");
		$r = array();
		//验证用户名是否已经存在
		foreach($row as $k => $v){
			if(trim($_POST['account']) == $v['account']){
				$r["result"] = "has_account";
				echo json_encode($r);
				exit;
			}
		}
		$r["result"] = "success";
		echo json_encode($r);
		exit;
	}else{
		//删除重复密码
		unset($_POST['repasswd']);

		//创建注册时间
		$_POST['addtime'] = date("Y-m-d H:i:s");

		//给密码加密
		$_POST['passwd']  = md5($_POST['passwd']);
		$_POST['img'] = 'http://192.168.3.11/img/upload/default.jpg';
		// 把用户的账号信息存储起来
	    $_SESSION['account'] = $_POST['account'];
			$_SESSION['id'] =  $mysql->getOneData('user','id','account = "'.$_SESSION['account'].'"')['id'];

	    //实现记住账号密码功能
	    if($_POST['remember']=="1"){
	    	setcookie('account',       $row['account'],     time() + 30*24*60*60);
	    	setcookie('passwd',     $_POST['passwd'], time() + 30*24*60*60);
	    }else{
	    	setcookie('account',       $row['account'],     time() - 30*24*60*60);
	    	setcookie('passwd',     $_POST['passwd'], time() - 30*24*60*60);
	    }

		$arr = array();
		$arr["result"]  = $mysql->insertData("user", $_POST);
		echo json_encode($arr);

	}
