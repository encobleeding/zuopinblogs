
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

		$arr = array();
		foreach($fancid as $key => $val){
	//		if($key<=8){
				$arr[]  = $mysql->getOneData("user", "*", 'id = "'.$val.'"');
	//		}
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
				<li id="typ" class="hidden"><?=$_GET['typ']?></li>
				<li class=""><a href="userartic.php">&nbsp;&nbsp;文章</a><div class="line"></div></li>
				<li class=""><a href="usertarget.php">&nbsp;&nbsp;关注用户</a><div class="line"></div></li>
				<li class="active"><a href="userfanc.php">&nbsp;&nbsp;粉丝</a><div class="line"></div></li>
				<li class=""><a href="">&nbsp;&nbsp;热门</a><div class="line"></div></li>
			</ul>
			<div class="contents">
				<ul class="note-list">
				<?php

					foreach($arr as $k => $v){

						//把每个用户的关注转换为数组
						$v["targetid"] = explode(",",$v["targetid"]);

						//把每个用户的粉丝转换为数组
						$v["fansid"] = explode(",",$v["fansid"]);
//						var_dump($v["fansid"]);
//						exit;
						//统计博客字数
						$blogs = $mysql->selectData("blogs", "*", 'aid = "'.$v['id'].'"');
						$words = 0;
						foreach($blogs as $bg){
							$words = $words + strlen($bg['content']);
						}
				?>
					<li class="artic">
						<a href="./usersartic.php?id=<?=$v['id']?>" class="avatar"><img src="<?=$v['img']?>"/></a>
						<div class="name">
							<a href="./usersartic.php?id=<?=$v['id']?>"><?=$v['username']?></a>
							<p>关注 <?=count($v['targetid'])?> | 粉丝 <?=count($v['fansid'])?> | 文章 <?=$v['blognum']?></p>
							<p>写了 <?=$words?> 个字，获得了 <??> 个喜欢</p>
						</div>
						<a class="hidden"><?=$v['id']?></a>
				<?php
						if(in_array($user['id'], $v['fansid'])){
							echo '<a href="javascript:;"><span class="btn btn-default fanc">已关注</span></a>
							</li>';
						}else{
							echo '<a href="javascript:;"><span class="btn btn-success fanc">关注</span></a>
							</li>';
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
