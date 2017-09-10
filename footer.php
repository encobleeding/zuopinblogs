		
				</ul>
			</div>
		</div>
		
		<!--右侧部分开始-->
		<div class="body-right">
			<div class="tit">个人介绍</div>
			<span class="set"><i>i</i> 编辑</span>
			<div class="oney-line">
				<div class="con">
					<?=$user['sign']?>
				</div>
			</div>
			<form id="set_coun" action="" method="post">
				<div class="control-group">
		            <div class="controls">
		                <textarea class="user-cot" name="sign"><?=$user['sign']?></textarea>
		            </div>
		        </div>
				<div id="save" class="button">保存</div>
				<div id="saveout" class="button">取消</div>
			</form>
			
			<ul class="likes">
				<a href="javascript:;"><li><span>我关注的专题/文集</span></li></a>
				<a href="javascript:;"><li><span>我喜欢的文章</span></li></a>
			</ul>
			<ul class="likes">
				<li><span>我创建的专题</span></li>
				<li><span class="new">创建一个新专题</span></li>
			</ul>
			<ul class="likes">
				<li><span>我的文集</span></li>
				<li><span>日记本</span></li>
			</ul>
		</div>
	</div>
	<!--body部分结束-->
 	

  <footer></footer>
  <!-- ／脚注区域 -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="lib/jquery/jquery-3.2.1.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="lib/bootstrap/js/bootstrap.js"></script>
  <script src="js/main.js"></script>
   <script src="js/user.js"></script>
</body>

</html>
