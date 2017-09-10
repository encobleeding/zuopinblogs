<?php
	require './common/session.php';
	require './common/common.php';
	$result = array();
	if(!$_POST['account']){
		$result['account'] = $_COOKIE['account'];
		$result['passwd'] = $_COOKIE['passwd'];
		echo json_encode($result);
        exit;
	}else{
		$row = $mysql->getOneData("user", "*", 'account = "'.trim($_POST['account']).'"');
	}

	//验证账号
    if(!$row['account']){
        $result['result'] = 'invaild_name';
        echo json_encode($result);
        exit;
    }

	//验证密码
    if($row['passwd'] != md5($_POST['passwd'])){
        $result['result'] = 'invaild_passwd';
        echo json_encode($result);
        exit;
    }

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
//  echo (int) $row['loginnum'];
	//修改登录次数,以及登录时间
	$data = array("loginnum" => ((int) $row['loginnum'] + 1) , "lasttime" => date("Y-m-d H:i:s"));
	$r = $mysql->updateData("user", $data, 'id = '.$row['id']);
//	var_dump($r) ;

    //使用函数json_encode() 输出json格式的数据
    $result = array('result'=>'success');
    echo json_encode($result);
