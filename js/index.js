$('#textarea').focus(function() {
	console.log($(this).attr('session'));
	if(!$(this).attr('session')){
		window.location.href = './login.php';
	}else{
		$('#comments').css('display','block');
	}
});

$('#comments-consoil').click(function (){
	$('#comments').css('display','none');
	$('#textarea').val('');
});

// 添加新的评论到页面上，存入数据库
$('#comments-send').click(function() {
	if($('#textarea').val()){
		var parentid = $(this).attr('parentid');
		var content = $('#textarea').val();
		var userid = $(this).attr('userid');
		console.log(userid);
		console.log(parentid);
		$.ajax({
			url: './add.php',
			type: 'POST',
			dataType: 'json',
			data: {parentid:parentid, content:content,aid:userid},
			success : function (data) {
				//console.log(123);
				$('#plnr').prepend('<div class="pl"><div class="pl-img"><img src="'+data.img+'" alt="" style="width:100%;height:100%;border-radius:50%;"></div><div class="pl-position"><div class="pl-name">'+data.username+'</div><div class="pl-time">'+data.r+'</div></div><div class="pl-content">'+content+'</div></div>');
				$('#textarea').val('');
			}
		});

	};
});
// 点击按钮 评论加载
$('#button_all').on('click','button',function () {
	var page =parseInt($(this).attr('value'));
	$.ajax({
		url: 'comment_select.php',
		type: 'POST',
		dataType: 'json',
		data: {page:page},
		success:function (data) {

			$('#plnr').html('');
			for(k in data){
				if(k!='totalpage'){
					$('#plnr').append('<div class="pl"><div class="pl-img"><img src="" alt=""></div><div class="pl-position"><div class="pl-name">'+data[k]['userid']+'</div><div class="pl-time">'+data[k]['addtime']+'</div></div><div class="pl-content">'+data[k]['content']+'</div></div>')
				}
			}
			$('#button_all').html('');
			$('#button_all').append('<button value="1" class="btn">首页</button>');
			if(page>1){
				$('#button_all').append('<button value="'+(page-1)+'"  class="btn">上一页</button>')
			}
			for(var i=0;i<5;i++){
				if(page+i>data.totalpage){
					break;
				}
				$('#button_all').append('<button value="'+(page+i)+'" class="btn">'+(page+i)+'</button>')
			}
			if(page<data.totalpage){
				$('#button_all').append('<button value="'+(page+1)+'" class="btn">下一页</button>')
			}
			$('#button_all').append('<button value = "'+data.totalpage+'" class="btn">尾页</button>')
		}
	});
	var m = $('#textarea').offset();
	$('html,body').animate({scrollTop:m.top},500);
});

$('#button_all').on('mouseenter','button',function () {
	$(this).addClass('btn-bg');
});
$('#button_all').on('mouseleave','button',function () {
	$(this).removeClass('btn-bg');
});
//var m=1;
$('.author3-a').click(function() {
	//console.log($(this).attr('index'));
	that = $(this);
	if($(this).attr('value')){
		if($(this).text() == '关注作者'){
			//console.log(1);
			$(this).text('已关注');
			$(this).removeClass('btn-success');
			$(this).addClass('btn-danger');
			$.ajax({
				url:'./follow.php',
        type:'POST',
        dataType:'json',
        data:{
          follow:'follow',
          id:that.attr('index')
        },
        success:function(){}
			})
		}else if($(this).text() == '已关注'){
			$(this).text('关注作者');
			$(this).addClass('btn-success');
			$(this).removeClass('btn-danger');
			$.ajax({
				url:'./follow.php',
        type:'POST',
        dataType:'json',
        data:{
          follow:'notfollow',
          id:that.attr('index')
        },
        success:function(){}
			})
		}
	}else{
		window.location.href = './login.php';
	}
	//m+=1;
	//var t=Math.pow(-1,m);
	//if(t>0){
		// $(this).text('已关注');
		// $(this).removeClass('btn-success');
		// $(this).addClass('btn-danger');
	//}else{
		// $(this).text('关注作者');
		// $(this).addClass('btn-success');
		// $(this).removeClass('btn-danger');
	//}
});

// var n=1;
// $('.author3-a').click(function(event) {
// 	n+=1;
// 	var t=Math.pow(-1,n);
// 	if(t>0){
// 		$(this).text('已关注');
// 		$(this).removeClass('btn-success');
// 		$(this).addClass('btn-danger');
// 	}else{
// 		$(this).text('关注作者');
// 		$(this).addClass('btn-success');
// 		$(this).removeClass('btn-danger');
// 	}
// });
