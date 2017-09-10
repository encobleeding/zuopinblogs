$(function(){
	$('#del_account').click(function(){
		if(confirm('请确认是否要删除帐号,该操作无法恢复!!!')){
			if(confirm('请再次确认是否要删除帐号,该操作无法恢复!!!')){
				var $del=$('#del_account').text();
				$.ajax({
					type:'POST',
					url:'del_account.php',
					dataType:"json",
					data: {del:$del},
					success:function (data){
					if(data.result){
		                window.location.href='./login.php';
		                }
					}
		});
			}
		}
	});
	
	$('#blacklist_del').on('click','li',function(){
		$(this).css('display','none');
	});

	$(".aside ul").on('click','li',function(){
		$(this).css({'background':'#F0F0F0','border-radius':'5px'});
		$(this).siblings().css({'background':'#fff','border-radius':'5px'});
	});
	$('#base').click(function(){
		$('.base').css('display','block');
		$('.information').css('display','none');
		$('.certification').css('display','none');
		$('.blacklist').css('display','none');
		$('.setting-pay').css('display','none');
		$('.account').css('display','none');
	});
	$('#information').click(function(){
		$('.base').css('display','none');
		$('.information').css('display','block');
		$('.certification').css('display','none');
		$('.blacklist').css('display','none');
		$('.setting-pay').css('display','none');
		$('.account').css('display','none');
	});
	$('#certification').click(function(){
		$('.base').css('display','none');
		$('.information').css('display','none');
		$('.certification').css('display','block');
		$('.blacklist').css('display','none');
		$('.setting-pay').css('display','none');
		$('.account').css('display','none');
	});
	$('#blacklist').click(function(){
		$('.base').css('display','none');
		$('.information').css('display','none');
		$('.certification').css('display','none');
		$('.blacklist').css('display','block');
		$('.setting-pay').css('display','none');
		$('.account').css('display','none');
	});
	$('#setting-pay').click(function(){
		$('.base').css('display','none');
		$('.information').css('display','none');
		$('.certification').css('display','none');
		$('.blacklist').css('display','none');
		$('.setting-pay').css('display','block');
		$('.account').css('display','none');
	});
	$('#account').click(function(){
		$('.base').css('display','none');
		$('.information').css('display','none');
		$('.certification').css('display','none');
		$('.blacklist').css('display','none');
		$('.setting-pay').css('display','none');
		$('.account').css('display','block');
	});
	//验证昵称格式

	$('#username').blur(function(){

		if($('#username').val()){
			if($('#username').val().search(/^[\u4e00-\u9fa5a-zA-Z0-9_]+$/)){
				$('.username-bt').html('请输入中文,数字,英文以及下划线！');
			}else{
				$('.username-bt').html('');
			}
		}else{
			$('.username-bt').html('请输入昵称!');
		}
	});

	//验证手机和邮箱格式
	$('#email').blur(function(){
		if($('#email').val()){
			if($('#email').val().search(/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/)){
				$('.email-bt').html('请输入正确的邮箱!');
			}else{
				$('.email-bt').html('');
			}
		}
	});

	$('#tel').blur(function(){
		if($('#tel').val()){
			if($('#tel').val().search(/^1[34578]\d{9}$/)){
				$('.tel-bt').html('请输入正确的手机号!');
			}else{
				$('.tel-bt').html('');
			}
		}
	});

	$('#base_save').click(function(){
		if(!($('#username').val())){
			//console.log(111);
			return;
		}else{
			if($('#username').val().search(/^[\u4e00-\u9fa5a-zA-Z0-9_]+$/)){
				//console.log(222);
				return;
			}
		}
		if($('#email').val()){
			if($('#email').val().search(/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/)){
				return;
			}
		}
		if($('#tel').val()){
			if($('#tel').val().search(/^1[34578]\d{9}$/)){
				return;
			}
		}
		console.log($('#base_form').serialize());
		$.ajax({
			type:"POST",
			url: "setted.php",
			dataType:"json",
			data: $('#base_form').serialize(),
			success:function (data){
			 					console.log(data);
                if(data.email=='false'){
                	alert('邮箱已经被使用了!');
                }
                if(data.tel=='false'){
                	alert('手机号已经被使用了!');
                }
                if(data.result){
                	alert('保存成功!');
                	window.location.reload();
                }
            }
		});
	});

	$('#unbind_tel').click(function(){
		var $tel=$('#unbind_tel').text();
		if(confirm('确定要解除手机绑定?')){
			$.ajax({
				type:"post",
				url:"./unbind.php",
				dataType:"json",
				data:{tel:$tel},
				success:function (data){
					//alert('解除手机绑定成功!');
					window.location.reload();
				}
			})
		}
	});

	$('#unbind_email').click(function(){
		var $email=$('#unbind_email').text();
		if(confirm('确定要解除邮箱绑定?')){
			$.ajax({
				type:"post",
				url:"./unbind.php",
				dataType:"json",
				data:{email:$email},
				success:function (data){
					//alert('解除邮箱绑定成功!');
					window.location.reload();
				}
			});
		}
	});


	$('#information_save').click(function(){
		$.ajax({
		type:'POST',
		url:'info_setted.php',
		dataType:"json",
		data: $('#information_form').serialize(),
		success:function (data){
			if(data.result){
                	alert('保存成功!');
                	//window.location.reload();
                }
			}
		});
	});

});
