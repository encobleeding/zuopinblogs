		var ue = UE.getEditor('container1');
		ue.ready(function() {
            //设置编辑器的内容
            // ue.setContent('hello');
            //获取html内容，返回: <p>hello</p>
            var html    = ue.getContent();
            //获取纯文本内容，返回: hello
            var txt     = ue.getContentTxt();
        });
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
        // 自定义按钮绑定触发多图上传和上传附件对话框事件
        document.getElementById('j_upload_img_btn').onclick = function () {
        	var dialog = uploadEditor.getDialog("insertimage");
        	dialog.title = '多图上传';
        	dialog.render();
        	dialog.open();
        };
        // 多图上传动作
        var imgval = '';
        function _beforeInsertImage(t, result) {
        	var imageHtml = '';
        	for(var i in result){
        		imageHtml += '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
        		imgval    += ',' + result[i].src;
        	}
        	document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('imgval').value = imgval;
        }
        $('#changeplcotent').click(function(){
        	var content=ue.getContentTxt() ;
        	var sort =parseInt($(this).attr('sort'));
        	console.log(sort);
        	var title = $('#titlex').val();
        	if(!$('#titlex').val()){
        		$('#warning').css('opacity','1');
        		$('#titlex').focus();
        		return;
        	}
        	if(!imgval&&!content){
        		alert('博客无内容，请重新输入！');
        		return;
        	}
        	if(!imgval){
        		imgval = $(this).attr('imgval');
        	}

        	$.ajax({
        		url: 'addcontent2.php',
        		type: 'POST',
        		dataType: 'json',
        		data: {content:content,img:imgval,title:title},
        		success:function(data){
        			if(data.r=='success'){
        				ue.setContent(content);
        				alert('保存成功');
        			}
        		}
        	});  
        });
        $('#rechange').click(function(event) {
        	var content=ue.getContent() ;
        	content=$(this).attr('content');
        	var title = $(this).attr('title');
        	ue.setContent(content);
        	$('#titlex').val(title);
        });
        $('#titlex').blur(function(){
        	if(!$('#titlex').val()){
        		$('#warning').css('opacity','1');
        	}else{
        		$('#warning').css('opacity','0');
        	}
        })