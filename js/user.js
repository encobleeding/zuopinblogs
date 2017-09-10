$(function(){
	//头像鼠标移入显示菜单事件
	openMenu("#drop");
	
	//编辑个性签名事件
	$(".set").click(function(){
		$("#set_coun").css({"display":"block"})
		$(".oney-line").css({"display":"none"})
	})
	$("#saveout").click(function(){
		$("#set_coun").css({"display":"none"})
		$(".oney-line").css({"display":"block"})
	})
	$("#save").click(function(){
		$.ajax({
			url:"./users.php",
			type:"post",
			dataType:"json",
			data:{sign : $(".user-cot").val(), typ : "sign"},
			success:function(data){
//				console.log(data)
				if(data.result){
					$("#set_coun").css({"display":"none"})
					$(".oney-line").css({"display":"block"})
					$(".con").text($(".user-cot").val())
				}
			}
		});
	})
	
	//按钮点击事件
	flow(".targ");
	flow(".fanc");

	
	
	//页面滚动加载内容事件
//	var num = 1;
//	var nums = num*300
//	window.onscroll = function(){
//		
//		var typ = $("#typ").text();
//		var acroll = $(window).scrollTop();
//		while(acroll>nums){
//			num++
//			nums = num*400
////			console.log(num)
//			$.ajax({
//				
//				url:"./users.php",
//				type:"post",
//				dataType:"json",
//				data:{sign : $(".user-cot").val(), typ : typ , num : num},
//				success:function(data){
////					console.log(data)
//					
//					if(typ == "target"){
//						for(var i=0;i<data.length;i++){
//							$(".note-list").append('<li class="artic"><a href="" class="avatar"><img src="'+data[i].img+'"/></a><div class="name"><a href="">'+data[i].username+'</a><p>关注 '+data[i].targetid.length+' | 粉丝 '+data[i].fancid.length+' | 文章  '+data[i].blognum+'</p><p>写了 '+data[i].words+' 个字，获得了  个喜欢</p></div><a class="hidden">'+data[i].id+'</a><a href="javascript:;"><span class="btn btn-default targ">已关注</span></a></li>')
//						}
////						flow(".targ");
//					}else if(typ == "fanc"){
//						for(var i=0;i<data.length;i++){
//							var id = data[i].fansid.indexOf($("#self").text());
////							console.log(id);
//							if(id == -1){
//								$(".note-list").append('<li class="artic"><a href="" class="avatar"><img src="'+data[i].img+'"/></a><div class="name"><a href="">'+data[i].username+'</a><p>关注 '+data[i].targetid.length+' | 粉丝 '+data[i].fancid.length+' | 文章  '+data[i].blognum+'</p><p>写了 '+data[i].words+' 个字，获得了  个喜欢</p></div><a class="hidden">'+data[i].id+'</a><a href="javascript:;"><span class="btn btn-success fanc"id="fa_'+data[i].id+'">关注</span></a></li>')
//							}else{
//								$(".note-list").append('<li class="artic"><a href="" class="avatar"><img src="'+data[i].img+'"/></a><div class="name"><a href="">'+data[i].username+'</a><p>关注 '+data[i].targetid.length+' | 粉丝 '+data[i].fancid.length+' | 文章  '+data[i].blognum+'</p><p>写了 '+data[i].words+' 个字，获得了  个喜欢</p></div><a class="hidden">'+data[i].id+'</a><a href="javascript:;"><span class="btn btn-default fanc" id="fa_'+data[i].id+'";>已关注</span></a></li>')
//							}
//						}
////						flow(".fanc");
//					}
//				}
//			});
//		}
//	}
	
})//////////////////////////////////

//鼠标移入显示下拉菜单事件
function openMenu(obj){
	$(obj).mouseover(function(){
		$(this).addClass("open");
	}).mouseout(function(){
		$(this).removeClass("open");
	})
};

	//关注按钮事件
	function flow(obj){
		$(obj).mouseover(function(){
			if($(this).text()=="已关注"){
				$(this).text("取消关注")
			}
		})
		
	$(obj).mouseout(function(){
		if($(this).text()=="关注"){
			
		}else{
			$(this).text("已关注")
		}
	})
	
	$(obj).click(function(){
		
		if($(this).text()=="取消关注"){
			$.ajax({
				url:"./users.php",
				type:"post",
				dataType:"json",
				data:{targetid : $(this).parent().prev().text() , selfid : $("#self").text() ,typ : "取消关注"},
				success:function(data){
					console.log(data)
				}
			});
			$(this).removeClass("btn-default").addClass("btn-success").text("关注")
		}else{
			$.ajax({
				url:"./users.php",
				type:"post",
				dataType:"json",
				data:{targetid : $(this).parent().prev().text() , selfid : $("#self").text() ,typ : "关注"},
				success:function(data){
					console.log(data)
				}
			});
			$(this).removeClass("btn-success").addClass("btn-default").text("已关注")
		}
	})
}
