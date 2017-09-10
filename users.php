<?php
require './common/session.php';
require './common/admin_common.php';

	$user  = $mysql->getOneData("user", "*", 'account = "'.$_SESSION['account'].'"');

	//把targetid转换为数组
	$targetsids = explode(",", $user['targetid']);

	//把fancid转换为数组
	$fancids = explode(",", $user['fansid']);

	//创建记录条数判断条件
	$num = ($_POST['num']-1)*8;

	$row = array();


	if($_POST['typ'] == "sign"){
		//报存个性签名
		unset($_POST['typ']);
		$row['result'] = $mysql->updateData("user", $_POST, 'account = "'.$_SESSION['account'].'"');
		echo json_encode($row);
		exit;

	}else if($_POST['typ'] == "取消关注"){
		echo '<hr>';
		$row['result'] = $mysql->delFollow($_POST['selfid'], $_POST['targetid']);
		echo json_encode($row);
		exit;
	}else if($_POST['typ'] == "关注"){
		echo '<hr>';
		$row['result'] = $mysql->addFollow($_POST['selfid'], $_POST['targetid']);
		echo json_encode($row);
		exit;
	}else if($_POST['typ'] == "target"){
		//根据关注数组查询关注用户信息，每次查询8条记录，并用数组保存起来
		foreach($targetsids as $key => $val){
			if( $key>$num && $key<($num+8) ){
				$row[]  = $mysql->getOneData("user", "*", 'id = '. $val);
			}
		}

	}else if($_POST['typ'] == "fanc"){

		//根据粉丝数组查询关注用户信息，每次查询8条记录，并用数组保存起来
		foreach($fancids as $key => $val){
			if( $key>$num && $key<($num+8) ){
				$row[]  = $mysql->getOneData("user", "*", 'id = '. $val);
			}
		}
	}

	//循环8条记录
	foreach($row as $k => $v){
		//把每个用户的关注转换为数组
		$row[$k]["targetid"] = explode(",",$v["targetid"]);
		//把每个用户的粉丝转换为数组
		$row[$k]["fancid"] = explode(",",$v["fancid"]);
		//查询该用户的博客发布
		$blogs = $mysql->selectData("blogs", "*", 'aid = '. $v['id']);
		$words = 0;
		foreach($blogs as $bg){
			$words = $words + strlen($bg['content']);
		}
		$row[$k]['words'] = $words;
	}
	echo json_encode($row);
