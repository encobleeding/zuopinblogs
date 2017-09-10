
<?php

	require './common/session.php';
	require './common/admin_common.php';
	require './common/session_common.php';

		$user  = $mysql->getOneData("user", "*", 'account = "'.$_SESSION['account'].'"');
//		var_dump($user);
//		exit;
		$users = $mysql->selectData("user", "*", '1=1');
//		var_dump($user);
//		exit;
		$blogs = $mysql->selectData("blogs", "*", 'aid = "'.$user['id'].'"');
//		var_dump($blogs);
//		exit;
		//统计文章数
		$artics = count($blogs);

		//统计粉丝数
		if($user['fansid']){
			$fancid  = explode(",", $user['fansid']);
			$fancs = count($fancid);
		}else{
			$fancs = 0;
		}

		//统计关注数
		if($user['targetid']){
			$targetsids = explode(",", $user['targetid']);
			$targets    = count($targetsids);
		}else{
			$targets = 0;
		}




		//统计字数
		$words = 0;
		foreach($blogs as $val){
			$words = $words + strlen($val['content']);
		}

	?>
	<!--body部分开始-->
	<div class="user-body">
		<span class="hidden" id="self"><?=$user['id']?></span>
		<!--左侧部分开始-->
		<div class="body-left">
			<div class="left-head">
				<a href="userartic.php?typ=artic" class="avatar">
					<img src="<?=$user['img']?>"/>
				</a>
				<div class="title">
					<a href="userartic.php?typ=artic" class="name"><?=$user['username']?></a>
				</div>
				<div class="info">
					<ul class="list-inline">
						<li><div class="info-like"><a href="usertarget.php?typ=target"><span><?=$targets?></span><br />关注 ></a></div></li>
						<li><div class="info-like"><a href="userfanc.php?typ=fanc"><span><?=$fancs?></span><br />粉丝 ></a></div></li>
						<li><div class="info-like"><a href="userartic.php?typ=artic"><span><?=$artics?></span><br />文章 ></a></div></li>
						<li><div class="info-like"><a href="javascript:;"><span><?=$words?></span><br />字数 ></a></div></li>
						<li><div class="info-like"><a href="javascript:;"><span>10</span><br />收获喜欢 ></a></div></li>
					</ul>
				</div>
			</div>

			<ul class="left-menu list-inline">
				<li class="active"><a href="userartic.php">&nbsp;&nbsp;文章</a><div class="line"></div></li>
				<li class=""><a href="usertarget.php">&nbsp;&nbsp;关注用户</a><div class="line"></div></li>
				<li class=""><a href="userfanc.php">&nbsp;&nbsp;粉丝</a><div class="line"></div></li>
				<li class=""><a href="">&nbsp;&nbsp;热门</a><div class="line"></div></li>
			</ul>
			<div class="contents">
				<ul class="note-list">
					<?php
						foreach($blogs as $val){
								$comment = $mysql->selectData("comment", "*", 'parentid = "'.$val['id'].'"');
								$val['content'] = mb_substr($val['content'], 0 , 70)."...";
								if($val['img']){
					?>
					<!--内容有图片-->
					<li class="have-img">
						<a href="" class="book-img"><?=$mysql->imgChange($val['img']);?></a>
						<div class="content">
							<div class="user">
								<a href="" class="avatar"><img src="<?=$user['img']?>"/></a>
								<div class="name">
									<a href=""><?=$user['username']?></a>
									<span id="time"><?=$val['addtime']?></span>
								</div>
							</div>
							<a href="./index.php?id=<?=$val['id']?>" class="title"><?=$val['title']?></a>
							<p class="user-content">
								<?=$val['content']?>
							</p>
							<div class="cont-foot">
								<a href=""><i></i>浏览 <?=$val['views']?></a>
								<a href=""><i></i>评论  <?=count($comment)?></a>
								<span><i></i>喜欢 0</span>
							</div>
						</div>
					</li>
					<?php
						}else{
					?>
					<!--内容没有图片-->
					<li class="no-img">
						<div class="content">
							<div class="user">
								<a href="#" class="avatar"><img src="<?=$user['img']?>"/></a>
								<div class="name">
									<a href="#"><?=$user['username']?></a>
									<span><?=$val['addtime']?></span>
								</div>
							</div>
							<a href="./index.php?id=<?=$val['id']?>" class="title"><?=$val['title']?></a>
							<p class="user-content"><?=$val['content']?></p>
							<div class="cont-foot">
								<a href=""><i></i>浏览  <?=$val['views']?></a>
								<a href=""><i></i>品论 <?=count($comment)?></a>
								<span><i>i</i>喜欢 12</span>
							</div>
						</div>
					</li>
				<?php
						}
					}

				?>

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
