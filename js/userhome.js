$(function(){
	///////////////////////////
	////   验证修改信息           ////
	//////////////////////////
	var boo1 = boo2 = boo3 = true;
	//验证用户名
	$("#username").focus(function(){
		$("#username").next().text("请输入用户名").css("color","green");
		boo1 = false;
//			console.log(1)
	});
	$("#username").focusout(function(){
		if($("#username").val()==""){
			$("#username").next().text("用户名不能为空").css("color","red");
			boo1 = false;
//				console.log(2)
		}else{
//				console.log(3)
			$.ajax({
				url:"./useraddtest.php",
				type:"post",
				dataType:"json",
				data:{username : $("#username").val()},
				success:function(data){
//						console.log(data)
		            if(data.result == 'has_username'){
		                $("#username").next().text("用户名已被使用").css("color","red");
		                boo1 = false;
		            }else if(data.result == 'success'){
		                $("#username").next().text("输入成功").css("color","green");
		                boo1 = true;
		            }else{
		            	$("#username").next().text("请重试").css("color","red");
		            	boo1 = false;
		            }
				}
			});
		};
	});
	//验证密码
	$("#password").focus(function(){
		$("#password").next().text("请输入8-16为字符").css("color","green");
		boo2 = false;
	});
	$("#password").focusout(function(){
		if($(this).val().length>=8&&$(this).val().length<=16){
			$("#password").next().text("密码输入正确").css("color","green");
			boo2 = true;
		}else{
			$("#password").next().text("密码格式错误").css("color","red");
			boo2 = false;
		};
	});
	//再次验证密码
	$("#confirm_password").focus(function(){
		$("#confirm_password").next().text("请再次输入密码").css("color","green");
		boo3 = false;
	});
	$("#confirm_password").focusout(function(){
		if($("#confirm_password").val()!==$("#password").val()){
			$("#confirm_password").next().text("密码不一致").css("color","red");
			boo3 = false;
		}else if($("#confirm_password").val()==""){
			$("#confirm_password").next().text("请再次输入密码").css("color","red");
			boo3 = false;
		}else{
			$("#confirm_password").next().text("密码输入正确").css("color","green");
			boo3 = true;
		}
	});
	
	//提交后，转换提交按钮为隐藏
	$("#submt").click(function(){
		console.log(boo1,boo2,boo3)
		if(boo1&&boo2&&boo3){
			$.ajax({
				url:"./keep.php",
				type:"post",
				dataType:"json",
				data:$('#signupForm').serialize(),
				success:function(data){
					console.log(data)
					if(data.result){
						alert('修改成功！')
					}
				}
			});
		}else{
			alert("错误！")
		}
	});
	///////////////////////////
	////   验证修改信息           ////
	//////////////////////////
		
	//////////////////////////////	
	////     图片上传	          ////   
	/////////////////////////////	
	
	//添加li样式
//	$("#upload_img_wrap li").css({"list-style-type": "none" , "margin" : "5px" , "padding": 0})
//	 li
 var ue = UE.getEditor('container');
        ue.ready(function() {
            //设置编辑器的内容
            // ue.setContent('hello');
            //获取html内容，返回: <p>hello</p>
            var html    = ue.getContent();
            //获取纯文本内容，返回: hello
            var txt     = ue.getContentTxt();
        });
// 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
           var uploadEditor = UE.getEditor("uploadEditor", {
               isShow: false,
               focus: false,
               enableAutoSave: false,
               autoSyncData: false,
               autoFloatEnabled:false,
               wordCount: false,
               sourceEditor: null,
               scaleEnabled:true,
               toolbars: [["insertimage", "attachment"]]
           });
           uploadEditor.ready(function () {
               uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
           });

        // // 自定义按钮绑定触发多图上传和上传附件对话框事件
           document.getElementById('j_upload_img_btn').onclick = function () {
               var dialog = uploadEditor.getDialog("insertimage");
               dialog.title = '多图上传';
               dialog.render();
               dialog.open();
           };

        // // 多图上传动作
           function _beforeInsertImage(t, result) {
               var imageHtml = '';
               var imgval = '';
               for(var i in result){
                   imageHtml += '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
                   imgval    += ',' + result[i].src;
               }
               document.getElementById('upload_img_wrap').innerHTML = imageHtml;
        //     //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
        //     //具体怎么设置看项目需求，我这里只是举个例子
               document.getElementById('imgval').value = imgval;
           }
    //////////////////////////////	
	////     图片上传	          ////   
	/////////////////////////////	
    
    
    
    
    
})////////////////////////////////////////////////////////
