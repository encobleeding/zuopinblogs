 <?php
    require  'common.php';
    if(!$_SESSION['passwd']||!$_SESSION['realname']){
    	 header('Location:../admin/mylogin1.php');
    	exit;
    };
