<?php
require 'header.php';
$flml = 'blogs';
$string = '官方账号';
$cate = $mysql->getOneData($flml, '*', 'id=' . $_GET['id']);
?>
<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->   
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN THEME CUSTOMIZER-->
				<div id="theme-change" class="hidden-phone">
					<i class="icon-cogs"></i>
					<span class="settings">
						<span class="text">主题颜色</span>
						<span class="colors">
							<span class="color-default" data-style="default"></span>
							<span class="color-green" data-style="green"></span>
							<span class="color-gray" data-style="gray"></span>
							<span class="color-purple" data-style="purple"></span>
							<span class="color-red" data-style="red"></span>
						</span>
					</span>
				</div>
				<!-- END THEME CUSTOMIZER-->
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<ul class="breadcrumb">
					<li>
						<a href="mydb.php">首页</a>
						<span class="divider">/</span>
					</li>
					<li>
						<a href="showofficial.php">官方博客</a>
					</li>

					<li class="pull-right search-wrap">
						<form action="search_result.html" class="hidden-phone">
							<div class="input-append search-input-area">
								<input class="" id="appendedInputButton" type="text">
								<button class="btn" type="button"><i class="icon-search"></i> </button>
							</div>
						</form>
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>

		<div class="widget red">
			<form action="" id="addcate" class="form-horizontal">
				<div class="control-group">
					<label class="control-label">输入标题</label>
					<div class="controls">
						<input type="text" class="span6" id="titlex" value="<?=$cate['title']?>">
						<span class="help-inline" id="warning" style="opacity: 0;color:red;"><font><font>请输入标题！</font></font></span>
					</div>
				</div>
				<div class="control-group">
					<button type="button" id="j_upload_img_btn" class='btn btn-danger'>多图上传</button>
					<ul id="upload_img_wrap"></ul>
					<input type="hidden" id="imgval" name="imgval" value="">
					<textarea id="uploadEditor" style="display: none;"></textarea>
				</div>
				<div class="widget-body form">
					<input type="hidden" name='id' value="<?=$_GET['id']?>">
					<div class="control-group "   id="container2">
						<script id="container1" name="content" type="text/plain" style="width:90%;height:300px" ><?=$cate['content']?></script>
					</div>
					<div class="form-actions">
						<button class="btn btn-success" id="changeplcotent" type="button">保存</button>
						<button class="btn" type="reset" id='rechange'>重置</button>
					</div>

					<!-- END FORM-->
				</div>
			</form>
		</div>

	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->
	<?php 
	require 'footer.php';
	?>
	<script src="handl.js"></script>
	<script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
	<script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
	<script>

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
        	var id="<?=$cate['id']?>";
        	var sort ="<?=$_GET['sort']?>";
        	var title = $('#titlex').val();
        	if(!imgval&&!content){
        		alert('博客无内容，请重新输入！');
        		return;
        	}
        	if(!imgval){
        		imgval = "<?=$cate['img']?>";
        	}
        	$.ajax({
        		url: 'updata.php',
        		type: 'POST',
        		dataType: 'json',
        		data: {id:id,content:content,sort:sort,img:imgval,title:title},
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
        	content="<?=$cate['content']?>";
        	var title = "<?=$cate['title']?>"
        	ue.setContent(content);
        	$('#titlex').val(title);
        });
        $('#titlex').blur(function(){
        	console.log($('#titlex').val());
        	if(!$('#titlex').val()){
        		$('#warning').css('opacity','1');

        	}
        })
    </script>