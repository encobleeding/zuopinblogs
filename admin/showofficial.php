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
						<a href="showofficial.php">官方账号</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="widget-body">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>id</th>
						<th class="hidden-phone">title</th>
					</tr>
				</thead>
				<tbody id="tablex">
				</tbody>
			</table>
		</div>
		<button class='btn btn-success' id='btn_add' value="<?=$result['id']?>" name="btn-add" style='float: right;margin:0 16px 20px 0;width:80px;height: 30px; '>发布</button>
		<div class="widget red">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i>官方博客列表</h4>
				<span class="tools">
					<a href="javascript:;" class="icon-chevron-down"></a>
					<a href="javascript:;" class="icon-remove"></a>
				</span>
			</div>
			<div class="widget-body">
				<table class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th style="width:8px;"></th>
							<th>id</th>
							<th>aid</th>
							<th class="hidden-phone">title</th>
							<th class="hidden-phone">content</th>
							<th class="hidden-phone">views</th>
							<th class="hidden-phone">updatatime</th>
							<th class="hidden-phone">handl</th>
						</tr>
					</thead>
					<tbody>
						<form action="showofficial.php" method="get">
							<input type="hidden" name="sort" value = "<?=$_GET['sort']?>">
							<select id="myselect"  name="keywords" >
								<option value='id' >id</option>
								<option value='aid' <?= $_GET['keywords']=="aid"?" selected":"" ?>>aid</option>
								<option value='username' <?= $_GET['keywords']=="username"?" selected":"" ?>>username</option>
								<option value='title' <?= $_GET['keywords']=="title"?" selected":"" ?>>title</option>
								<option value='views' <?= $_GET['keywords']=="views"?" selected":"" ?>>views</option>
							</select>
							<input type="text" value="<?=$_GET['keyvalue']?>" placeholder="请输入数字或中文..." id='myinput' name="keyvalue">
							<input id='mybtn_serch' class="btn" style="position: relative;top:-5px;left:10px;" type="submit" value='搜索'>
						</form>
						<?php
						$page = ($_GET['page']>1?$_GET['page']:1);
						$pagenum = 10;
						$where = 'aid=6';
						if($_GET["keywords"]&&$_GET['keyvalue']){
							$key = $_GET["keywords"];
							$value = $_GET['keyvalue'];
							 if(!is_numeric($value)){
          // $value = '"'.$value.'"';
								$where = 'aid=6'.' AND '.$key.' LIKE "%'.$value.'%"';
							}else{
								$where.= ' AND '.$key.'='.$value.'';
							}
						}
						$start = ($page-1)*$pagenum;
						$row = $mysql->selectData('blogs','count(*) AS nums',$where,'addtime DESC');
						$totalpage  = ceil($row[0]['nums']/$pagenum);
						$result = $mysql->selectData('blogs','*',$where,'addtime DESC',$start,$pagenum);
						foreach ($result as $k => $v) {
							?>
							 <tr>
							<td><input type="checkbox" class="checkboxes ok"
							 index="<?=$v['ad']=="t"?1:0?>"  id="<?=$v['id']?>"
							<?=$v['ad']=="t"?" checked":""?> ></td>
							<td><?=$v['id']?></td>
							<td><?=$v['aid']?></td>
							<td><?=str_replace($_GET['keyvalue'], '<span style="color:red;">'.$_GET['keyvalue'].'</span>', $v['title'])?></td>
							<td class="hidden-phone"><textarea rows="1" cols="1" ><?=$v['content']?></textarea></td>
							<td><?=$v['views']?></td>
							<td><?=$v['updatetime']?></td>
							<td>
								<a class="btn btn-primary " href="changecontent.php?id=<?=$v['id']?>&sort=4"><i class="icon-pencil"></i></a>
								<button class="btn btn-danger delete" name="delete" value="<?=$v['id']?>" index="<?=$_GET['sort']?>"><i class="icon-trash "></i></button>
							</td>
						</tr>
				<?php	}?>
				</tbody>
			</table>
		</div>
		<div id="btn_page">
			<a href="showofficial.php?page=1" >首页</a>
			<?php
			if($page>1){
				echo '<a href="showofficial.php?page='.($page-1).'">上页</a>';
			}
			?>
			<?php
			if($page>2){
				$a=-2;
			}else{
				$a=-1;
			}
			for ($i=$a; $page+$i>0&&$i<0; $i++) {
				if($i+$page>$totalpage){
					break;
				}
				echo '<a href="showofficial.php?page='.($page+$i).'" >'.($page+$i).'</a>';
			}
			?>
			<a href="showofficial.php?page=<?=$page?>" id="mypage"><?=$page?></a>
			<?php
			for ($i=1; $i<3 ; $i++) {
				if($i+$page>$totalpage){
					break;
				}
				echo '<a href="showofficial.php?page='.($page+$i).'">'.($page+$i).'</a>';
			}
			?>
			<?php
			if($page<$totalpage){
				echo '<a href="showofficial.php?page='.($page+1).'">下一页</a>';
			}
			?>
			<a href="showofficial.php?page=<?=$totalpage?>" >尾页</a>
		</div>
	</div>
	<a id='sure' class='btn btn-primary'>确认修改</a>
	<a  class="btn btn-primary" href='addcontent.php?sort=4'>添加博客</a>
</div>
<?php
require 'footer.php';
?>
<script src="handl.js"></script>
<script>
	$('#mypage').css('background','#CCCCCC');
	$('#btn_page').on('mouseenter','a',function () {
		$(this).addClass('change_background');
	});
	$('#btn_page').on('mouseleave','a',function () {
		$(this).removeClass('change_background');
	})
</script>
