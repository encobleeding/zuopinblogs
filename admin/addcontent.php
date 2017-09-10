<!-- 添加官方博客内容的页面 -->
<?php
require 'header.php';
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
						<a href="showblogs.php">首页</a>
						<span class="divider">/</span>
					</li>
					<li>
						<a href="showofficial.php">官方博客</a>
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
						<button class="btn btn-success" id="changeplcotent" type="button" sort="<?=$_GET['sort']?>" imgval = "<?=$cate['img']?>">保存</button>
						<button class="btn" type="reset" id='rechange' content="<?=$cate['content']?>" title = "<?=$cate['title']?>">重置</button>
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
	<script src="addcontent.js"></script>