<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="utf-8" />
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<body class="lock">
	<div class="lock-header">
		<img class="center" alt="logo" src="img/logo.png">
	</div>
	<div class="login-wrap">
		<div class="metro single-size red">
			<div class="locked">
				<i class="icon-lock"></i>
				<span>登录</span>
			</div>
		</div>
		<form action="mylogin.php" method="post" id="formn">
			<div class="metro double-size green">
				<div class="input-append lock-input">
					<input type="text" name="realname" placeholder="账号" id="ipt1" value="<?=$_COOKIE['realname']?>">
				</div>
			</div>
			<div class="metro double-size yellow">
				<div class="input-append lock-input">
					<input type="password" name="passwd"  placeholder="密码" id="ipt2" value="<?=$_COOKIE['passwd']?>">
				</div>
			</div>
			<div class="metro single-size terques login">
				<button type="button" class="btn login-btn" id="login">
					登录
					<i class=" icon-long-arrow-right"></i>
				</button>
			</div>
			<div class="login-footer">
				<div class="remember-hint pull-left">
					<input type="checkbox" name="remember"  value="1"  
					<?=$_COOKIE['realname'] && $_COOKIE['passwd']? "checked":"";?> >记住我
				</div>
			</div>
			<div id="remend1"></div>
			<div id="remend2"></div>
		</div>
	</form>



</body>
</html>
<script src="js/jquery-1.8.3.min.js"></script>
<script src='mylogin.js'></script>