
<?php
	require './common/session.php';
	require './common/common.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>简书-登陆</title>
	<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
	<link rel="icon" href="./images/logo.png">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
		*{margin: 0; padding: 0; box-sizing: border-box;}
		html,body{ width: 100%; height: 100%;}
		.entirety{ width: 100%; height: 100%; background-color:#f1f1f1; display: flex;justify-content: center;align-items: center; }
		.box{ width: 400px; height: 520px; background-color:#fff; padding: 20px 50px 50px; border-radius: 5px;}
		.box-box1{height: 100px;display: flex;justify-content: center;align-items: center;  font-weight: 600; font-size: 20px;text-align: center;}
		.box-box1 a{text-decoration: none;width: 60px; height: 40px;color: #969696;}
		.box-box1 i{ width: 30px; height: 40px; color: #969696;}
		.box-box1-a1{color: #ea6f5a; border-bottom: 3px solid #ea6f5a; }
		.box-box1-a2:hover{border-bottom: 3px solid #ea6f5a; color: #969696;}


		.box-box2-inp1,.box-box2-inp2{ width: 100%; height: 50px; border-radius: 4px 4px 0 0; padding: 4px 12px 4px 35px; background-color: hsla(0,0%,71%,.1);box-sizing:border-box; border-bottom: none; border: 1px solid #c8c8c8;}


		.box2-div1{height: 60px; box-sizing: border-box; color: #969696;display: flex;align-items: center;}
		.box2-div1-item1{width: 30%;}
		.box2-div1-item2{width: 70%;display: flex;}

		.box2-div1-item2 ul{list-style: none; background:#ccc;border-radius: 5px; display: none;}
		.box2-div1-item2 li{ height: 40px; line-height: 40px;}
		.box2-div1-item2 a{text-decoration: none; color: #969696; padding: 10px 20px;}


		button{ width: 100%; height: 50px; border-radius: 25px; color: #fff; font-size:18px; background: #187cb7; border:0; margin-top:10px; }


		.box-box3 h6{ color: #b5b5b5; width: 100%; height: 30px; font-size: 14px; text-align: center; line-height: 30px;}
		.box-box3 ul{list-style: none; display: flex;justify-content: center;align-items: center;}
		.box-box3 a{text-decoration: none;}
		img{width: 50px; height: 50px;}
		.box-box3 li{width: 50px; height: 50px; border-radius: 50%; margin:0 5px; text-align: center; line-height: 50px;}
		/*.weibo{ background: #e05244;}
		.weixin{background: #00bb29;}
		.qq{background: #498ad5;}
		.douban{background: #00820f;}*/

		span.alert{position:absolute;top: -2px;word-break:keep-all;white-space:nowrap;left: 294px;}
		#menu{top:194px;left:632px;}
	</style>
</head>
<body>


	<div class="entirety">
		<div class="box">
			<div class="box-box1">
				<a href="#" class='box-box1-a1'>登录</a>
				<i>·</i>
				<a href="./register.php" class='box-box1-a2'>注册</a>
			</div>

			<div class="box-box2">
				<form action="login.php" id="login_form" method="POST" >
					<div class="form-group" style="margin-bottom:0px; position: relative;">
					<input type="text" name="account" id="account" value="" placeholder="账号" class="box-box2-inp1">
						<span class="alert"></span>
					</div>
					<div class="form-group" style="margin-bottom:0px; position: relative;">
					<input type="password" name="passwd" id="passwd" value="" placeholder="密码"  class="box-box2-inp2">
						<span class="alert"></span>
					</div>


					<div class="box2-div1">
						<div class="box2-div1-item1">
							<label>
								<input type="checkbox" name="remember" id="remember" value='1'> 记住我
							</label>
							</div>
						<div class="box2-div1-item2">
							<span class="span1 dropdown" data-toggle="dropdown"><a href="javascript:;">登录遇到问题？</a></span>
							<ul class="dropdown-menu" id="menu">
								<li><a href="#">用手机号重置密码</a></li>
								<li><a href="#">用邮箱重置密码</a></li>
								<li><a href="#">无法用海外手机号登录</a></li>
								<li><a href="#">无法用Google账号登录</a></li>
							</ul>
					</div>

				</div>
					<button type="button" id="login_btn">登录</button>
				</form>
			</div>
			<!-- 社交账号登录 -->
			<div class="box-box3">
				<h6>社交账号登录</h6>
				<ul>
					<li class="weibo"><a href="#" ><img src="./img/weibo.png"></a></li>
					<li class="weixin"><a href="#"><img src="./img/weixin.png"></a></li>
					<li class="qq"><a href="#"><img src="./img/qq.png"></a></li>
					<li class="douban"><a href="#"><img src="./img/douban.png"></a></li>
				</ul>
			</div>

		</div>

	</div>
</body>
</html>

<script>
	$(function () {
		$('.span1').on('click',function () {
			$('#ul1').toggle();
		})
	})
	$(function(){
			$.ajax({
				url:"./userlogin.php",
				type:"post",
				dataType:"json",
				data:{},
				success:function(data){
//					console.log(data.result);
	                $("#account").val(data.account);
	                $('#passwd').val(data.passwd);
	                if(data.passwd){
	                	document.querySelector("#remember").checked = true;
	                }else{
	                	document.querySelector("#remember").checked = false;
	                }
				}
			})
		});
		$("#login_btn").click(function(){
			console.log(222)
			var bool = document.querySelector("#remember").checked;
			$.ajax({
				url:"./userlogin.php",
				type:"post",
				dataType:"json",
				data:$('#login_form').serialize(),
				success:function(data){
					console.log(data.result);
	                if(data.result == 'invaild_name'){
	                    $("#account").next().text("无效的账号").css("color","red");
	                    $('#passwd').next().text("");
	                }else if(data.result == 'invaild_passwd'){
	                	$("#account").next().text("");
	                    $('#passwd').next().text("密码错误").css("color","red");
	                }else{
                    //alert('登录成功！');
	                    window.location.href = 'home.php';
	                }
				}
			});
		});
</script>
