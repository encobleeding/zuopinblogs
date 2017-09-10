$('#login').click(function() {
	$.ajax({
		url: 'mylogin.php',
		type: 'POST',
		dataType: 'json',
		data: $('#formn').serialize(),
		success:function (data) {
			if(data.r=='invaild_name'){
				$('#remend1').css('color','#CCCCCC').text('账号错误！');
				
			}
			if(data.r=='invaild_password'){
				$('#remend2').css('color','#CCCCCC').text('密码错误！');
			}
			if(data.r=='success'){
				 window.location.href = './showblogs.php?sort=1';
			}
		}
	})
});