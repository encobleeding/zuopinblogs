<?php
	require './common/session.php';
	require './common/common.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>简书-注册</title>
	<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
	<link rel="icon" href="./images/logo.png">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	*{padding: 0;margin: 0}
		html,body{width: 100%;height: 100%}
		.box{width: 100%;height: 100%; background-color:#f1f1f1;}
		.box-row1{height: 15%;}
		.box-row2-div{ background: #fff;height: 550px;width: 400px;margin: 0 auto; border-radius: 10px;}

		.row2-div-box1{ height: 100px;line-height: 100px;}
		.row2-div-box1 a{text-decoration: none;width: 60px; height: 50px;display: inline-block; font-size: 20px; line-height: 50px;color: #969696; font-weight: 600px;}
		.box-box1-a2{border-bottom: 3px solid #ea6f5a;}
		.box-box1-a1:hover{border-bottom: 3px solid #ea6f5a; color: #969696; }
		.row2-div-box1 i{ width: 40px; height: 40px; color: #969696;font-size: 20px;}

		.row2-div-box2{ height: 260px; text-align: center; }
		.box-box2-inp1,.box-box2-inp2,.box-box2-inp3{ width: 70%; height: 50px; border-radius: 4px 4px 0 0; padding: 4px 12px 4px 35px; background-color: hsla(0,0%,71%,.1);box-sizing:border-box;  border: 1px solid #c8c8c8;}
		.box-box2-inp1,.box-box2-inp2{border-bottom: none;}
		.box-box2-inp4{width: 70%; height: 40px; margin:20px 0; border-radius: 20px;}

		.row2-div-box4{ height: 50px;margin-top:20px; }

		.row2-div-box3 h6{ color: #b5b5b5; width: 100%; height: 30px; font-size: 14px; text-align:center; line-height: 30px;}
		.row2-div-box3 ul{list-style: none; display: flex;justify-content: center;align-items: center; margin:0;padding: 0 }
		.row2-div-box3 a{text-decoration: none;}
		img{width: 50px; height: 50px;}
		.row2-div-box3 li{width: 50px; height: 50px; border-radius: 50%; margin:0 5px; text-align: center; line-height: 50px;}
		span{position:absolute;top: 10px;word-break:keep-all;white-space:nowrap;}

	}
</style>
</head>
<body>
	<div class="container-fluid box">
		<div class="row box-row1"></div>

		<div class="row box-row2">
			<!-- 注册框 -->
			<div class="box-row2-div">
				<!-- 登录·注册 -->
				<div class="row row2-div-box1 text-center">
					<a href="./login.php" class='box-box1-a1'>登录</a>
					<i class=" text-muted">·</i>
					<a href="register.php" class='box-box1-a2'>注册</a>
				</div>
				<!-- 账号密码 -->
				<div class="row row2-div-box2">
					<form id="register_form">
						<div class="form-group" style="margin-bottom:0px; position: relative;">
							<input type="text" name="username" value="" id="username" placeholder="您的昵称" class="box-box2-inp1">
							<span></span>
						</div>

						<div class="form-group" style="margin-bottom:0px; position: relative;">
							<input type="text" name="account" value="" id="account" placeholder="您的账号" class="box-box2-inp1">
							<span class="span1"></span>
						</div>

						<div class="form-group" style="margin-bottom:0px; position: relative;">
							<input type="password" name="passwd" id="passwd" value="" placeholder="设置密码"  class="box-box2-inp2">
							<span class="span2"></span>
						</div>
						<div class="form-group" style="margin-bottom:0px; position: relative;">
							<input type="password" name="repasswd" id="repasswd" value="" placeholder="确认密码" class="box-box2-inp3">
							<span class="span3"></span>
						</div>
						<input type="button" id="register_btn" value="注册" class="box-box2-inp4 btn-success">
					</form>
				</div>
				<!-- 社交帐号直接注册 -->
				<div class="row row2-div-box4">
					<p class="text-center">点击 “注册” 即表示您同意并愿意遵守简书</p>
					<p class="text-center"><a href="#">用户协议</a> 和<a href=""> 隐私政策</a> 。</p>
				</div>
				<div class="row  row2-div-box3">
					<h6>社交账号直接注册</h6>
					<ul>
						<li class="weibo"><a href="#" ><img src="./img/weibo.png"></a></li>
						<li class="weixin"><a href="#"><img src="./img/weixin.png"></a></li>
						<li class="qq"><a href="#"><img src="./img/qq.png"></a></li>
						<!-- <li class="douban"><a href="#"><img src="./images/douban.png"></a></li> -->

					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src="lib/jquery/jquery-3.2.1.js"></script>
<script src='./js/register.js'></script>
<script>
	var boo1 = boo2 = boo3 = false;
	//验证用户名
		$("#account").focus(function(){
			$("#account").next().text("请输入用户名").css("color","green");
		});
		$("#account").focusout(function(){
			if($("#account").val()==""){
				$("#account").next().text("用户名不能为空").css("color","red");
				boo1 = false;
			}else{
				$.ajax({
					url:"./useradd.php",
					type:"post",
					dataType:"json",
					data:{account : $("#account").val()},
					success:function(data){
						console.log(data)
			            if(data.result == 'has_account'){
			                $("#account").next().text("用户名已被使用").css("color","red");
			            }else if(data.result == 'success'){
			                $("#account").next().text("输入成功").css("color","green");
			                boo1 = true;
			            }else{
			            	$("#account").next().text("请重试").css("color","red");
			            }
					}
				});
			};
		});

		//验证昵称
		$("#username").focus(function(){
			$("#username").next().text("请输入昵称").css("color","green");
		});
		$("#username").focusout(function(){
			if($("#username").val()==""){
				$("#username").next().text("昵称不能为空").css("color","red");
				boo4 = false;
			}else{
				$("#username").next().text("输入成功").css("color","green");
				boo4 = true;
			};
		});

	//验证密码
		$("#passwd").focus(function(){
			$("#passwd").next().text("请输入8-16为字符").css("color","green");
			boo2 = false;
		});
		$("#passwd").focusout(function(){
			if($(this).val().length>=8&&$(this).val().length<=16){
				$("#passwd").next().text("密码输入正确").css("color","green");
				boo2 = true;
			}else{
				$("#passwd").next().text("密码格式错误").css("color","red");
				boo2 = false;
			};
		});
		//再次验证密码
		$("#repasswd").focus(function(){
			$("#repasswd").next().text("请再次输入密码").css("color","green");
			boo3 = false;
		});
		$("#repasswd").focusout(function(){
			if($("#repasswd").val()!==$("#passwd").val()){
				$("#repasswd").next().text("密码不一致").css("color","red");
				boo3 = false;
			}else if($("#repasswd").val()==""){
				$("#repasswd").next().text("请再次输入密码").css("color","red");
				boo3 = false;
			}else{
				$("#repasswd").next().text("密码输入正确").css("color","green");
				boo3 = true;
			}
		});
		//注册按钮
		$("#register_btn").click(function(){
			console.log(boo1,boo2,boo3)
			if(boo1&&boo2&&boo3){
				$.ajax({
					url:"./useradd.php",
					type:"post",
					dataType:"json",
					data:$('#register_form').serialize(),
					success:function(data){
						console.log(data)
						if(data.result){
							//alert('注册成功');
							window.location.href="./home.php";
						}
					}
				});
			}else{
				alert("请完善注册信息！")
			}

		});
</script>
