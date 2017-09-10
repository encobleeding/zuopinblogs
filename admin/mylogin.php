<?php
require './common/common.php';
$result = $mysql->getOneData('admin','*','realname="'.trim($_POST['realname']).'"');
$arr = array();
if(!$result){
	$arr['r']='invaild_name';
	echo json_encode($arr);
	exit;
};
if($result['passwd']!=md5($_POST['passwd'])){
	$arr['r']='invaild_password';
	echo json_encode($arr);
	exit;
};
$_SESSION['realname'] = $_POST['realname'];
$_SESSION['id'] =$result['id'];
$_SESSION['passwd'] = $_POST['passwd'];
$mysql->updateData('admin',array('loginnum'=>$result['loginnum']+1,'lasttime'=>date('Y-m-d H:i:s')),'id='.$result['id'].'');
if($_POST['remember'] =='1'){
	setcookie('realname',$result['realname'],time()+720*3600);
	setcookie('passwd',$_POST['passwd'],time()+720*3600);
}else{
	setcookie('realname',' ',time()-720*3600);
	setcookie('passwd',' ',time()-720*3600);
}
$arr['r'] = 'success';
echo json_encode($arr);
?>