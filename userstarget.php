

<?php

	require './common/session.php';
	require './common/admin_common.php';
	require './common/session_common.php';

		$user  = $mysql->getOneData("user", "*", 'id = "'.$_GET['id'].'"');
		$self  = $mysql->getOneData("user", "*", 'account = "'.$_SESSION['account'].'"');
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
		if($targetsids){
			foreach($targetsids as $key => $val){

				$arr[]  = $mysql->getOneData("user", "*", 'id = "'.$val.'"');

			}
		}
		
	?>
	<!--body部分开始-->
	<div class="user-body">
		<span class="hidden" id="self"><?=$self['id']?></span>
		<!--左侧部分开始-->
		<div class="body-left">
			<div class="left-head">
				<a href="userartic.php?id=<?=$_GET['id']?>" class="avatar">
					<img src="<?=$user['img']?>"/>
				</a>
				<div class="title">
					<a href="userartic.php?typ=artic" class="name"><?=$user['username']?></a>
				</div>
				<div class="info">
					<ul class="list-inline">
						<li><div class="info-like"><a href="userstarget.php?id=<?=$_GET['id']?>"><span><?=$targets?></span><br />关注 ></a></div></li>
						<li><div class="info-like"><a href="usersfanc.php?id=<?=$_GET['id']?>"><span><?=$fancs?></span><br />粉丝 ></a></div></li>
						<li><div class="info-like"><a href="usersartic.php?id=<?=$_GET['id']?>"><span><?=$artics?></span><br />文章 ></a></div></li>
						<li><div class="info-like"><a href="javascript:;"><span><?=$words?></span><br />字数 ></a></div></li>
						<li><div class="info-like"><a href="javascript:;"><span>10</span><br />收获喜欢 ></a></div></li>
					</ul>
				</div>
			</div>
			<ul class="left-menu list-inline">
				<li id="typ" class="hidden"><?=$user['typ']?></li>
				<li class=""><a href="usersartic.php?id=<?=$user['id']?>">&nbsp;&nbsp;文章</a><div class="line"></div></li>
				<li class="active"><a href="userstarget.php?id=<?=$user['id']?>">&nbsp;&nbsp;关注用户 <?=$targets?></a><div class="line"></div></li>
				<li class=""><a href="usersfanc.php?id=<?=$user['id']?>">&nbsp;&nbsp;粉丝 <?=$fancs?></a><div class="line"></div></li>
				<li class=""><a href="">&nbsp;&nbsp;热门</a><div class="line"></div></li>
			</ul>
			<div class="contents">
				<ul class="note-list">
				<?php
					foreach($arr as $val){
						//把每个用户的关注转换为数组
						if($val["targetid"] ){
							$val["targetid"] = explode(",",$valv["targetid"]);
							$targs = count($val["targetid"] );
						}else{
							$val["targetid"] = array();
							$targs = 0;
						}


						//把每个用户的粉丝转换为数组
						if($val["fansid"] ){
							$val["fansid"] = explode(",",$val["fansid"]);
							$fans = count($val["fansid"] );
						}else{
							$val["fansid"] = array();
							$fans = 0;
						}
						//统计博客字数
						$blogs = $mysql->selectData("blogs", "*", 'aid = "'.$val['id'].'"');
						$words = 0;
						foreach($blogs as $bg){
							$words = $words + strlen($bg['content']);
						}
				?>
					<li class="artic">
						<a href="usersartic.php?id=<?=$val['id']?>" class="avatar"><img src="<?=$val['img']?>"/></a>
						<div class="name">
							<a href="usersartic.php?id=<?=$val['id']?>"><?=$val['username']?></a>
							<p>关注 <?=count($val['targetid'])?> | 粉丝 <?=count($val['fansid'])?> | 文章 <?=$val['blognum']?></p>
							<p>写了 <?=$words?> 个字，获得了 <??> 个喜欢</p>
						</div>
						<a class="hidden" id="userid"><?=$val['id']?></a>
				
				<?php
					if(in_array($self['id'], $val['fansid'])){
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
