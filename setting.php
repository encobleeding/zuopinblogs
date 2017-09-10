<?php
	require './common/session.php';
	require './common/admin_common.php';
	require './common/session_common.php';

	$set=$mysql->selectData('user','*','account= "'.$_SESSION['account'].'"');


?>

<div class="content setting">
	<div class="row">
		<div class="aside">
			<ul>
				<li id="base">
					<div class="setting-icon">
						<i class="iconfont icon-caidanA"></i>
					</div>
					<span>基础设置</span>
				</li>
				<li id="information">
					<div class="setting-icon">
						<i class="iconfont icon-zhanghaoguanli"></i>
					</div>
					<span>个人资料</span>
				</li>
				<li id="certification">
					<div class="setting-icon">
						<i class="iconfont icon-weiborenzheng"></i>
					</div>
					<span>微博认证</span>
				</li>
				<li id="blacklist">
					<div class="setting-icon">
						<i class="iconfont icon-heimingdan"></i>
					</div>
					<span>黑名单</span>
				</li>
				<li id="setting-pay">
					<div class="setting-icon">
						<i class="iconfont icon-yuan"></i>
					</div>
					<span>赞赏设置</span>
				</li>
				<li id="account">
					<div class="setting-icon">
						<i class="iconfont icon-tubiao39"></i>
					</div>
					<span>帐号管理</span>
				</li>
			</ul>
		</div>
		<div class="col-xs-8 col-xs-offset-4 main">

			<div class="base">
					<table>
						<tbody>
						<form id="base_form">
							<tr>
								<td class="top-line">
									<div class="avatar" id="upload_img_wrap">
										<img src=<?=$set[0]['img']?>>
									</div></td>
								<td class="top-line">
									<a type="button" class="btn btn-success" id="j_upload_img_btn">选择头像</a>
							        <!-- 传图片地址值用的 -->
							        <input type="hidden" id="imgval" name="img">

									<!--<a class="btn btn-success">
										<input unselectable="on" type="file" class="hide" name="headimg" id="headimg">
										选择头像
									</a>-->

								</td>
							</tr>

						<textarea id="uploadEditor" style="display: none;"></textarea>

							<tr>
								<td class="setting-title"> 昵称 </td>
								<td class="setted">
									<span class="pull-right username-bt"></span>
									<input type="text" value="<?=$set[0]['username']?>" style="outline:none;" name="username" id="username">
								</td>
							</tr>
							<tr>
								<td class="setting-title">电子邮件</td>
									<?php
										if(!$set[0]['email']){
											echo '<td class="setted">

												<span class="pull-right email-bt"></span>
												<input type="email" placeholder="请输入你的常用邮箱" style="outline:none;" id="email" name="email">

												</td>';
										}else{
											echo '<td class="setted">
												<div>
													'.$set[0]['email'].'
												</div><i class="iconfont icon-gou"></i><span>已验证</span>
												<a class="cancel-bind" id="unbind_email">解除邮箱绑定</a>
												</td>';
										}
									?>
							</tr>
							<tr>
								<td class="setting-title">手机</td>
								<?php
										if(!$set[0]['tel']){
											echo '<td class="setted">

												<span class="pull-right tel-bt"></span>
												<input type="email" placeholder="请输入你的常用手机号" style="outline:none;" id="tel"  name="tel">

												</td>';
										}else{
											echo '<td class="setted">
												<div>
													'.$set[0]['tel'].'
												</div><i class="iconfont icon-gou"></i><span>已验证</span>
												<a class="cancel-bind" id="unbind_tel">解除手机绑定</a>
												</td>';
										}
									?>
							</tr>
							<tr>
								<td class="setting-title setting-editor">常用编辑器</td>
								<td>
									<div class="col-xs-4">
										<input type="radio" value="plain" name="editor">
										<span>富文本</span>
									</div>
									<div class="col-xs-8">
										<input type="radio" value="markdown" name="editor">
										<span>Markdown</span>
									</div>
									<p>
										切换后对新建文章生效
									</p></td>
							</tr>
							<tr>
								<td class="setting-title setting-verticle">语言设置</td>
								<td>
									<div class="col-xs-4">
										<input type="radio" value="zh-CN" name="langu">
										<span>中文简体</span>
									</div>
									<div class="col-xs-8">
										<input type="radio" value="zh-TW" name="langu">
										<span>中文繁体</span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="setting-title setting-verticle">接收谁的简信</td>
								<td>
									<div class="col-xs-4">
										<input type="radio" value="true" name="who">
										<span class="responsive-span">所有人</span>
									</div>
									<div class="col-xs-8">
										<input type="radio" value="false" name="who">
										<span class="responsive-span">我关注的人、我发过简信的人</span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="setting-title setting-verticle">提醒邮件通知</td>
								<td>
									<div class="col-xs-4">
										<input type="radio" value="instantly" name="verticle">
										<span class="responsive-span">所有动态</span>
									</div>
									<div class="col-xs-5">
										<input type="radio" value="later" name="verticle">
										<span class="responsive-span">每天未读汇总</span>
									</div>
									<div class="col-xs-3">
										<input type="radio" value="none" name="verticle">
										<span class="responsive-span">不接收</span>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<input type="button" class="btn btn-success setting-save" value="保存" id="base_save">
				</form>
			</div>

			<div class="information">
				<form id="information_form">
					<table>
						<thead>
							<tr>
								<th class="setting-head"></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="top-line setting-title setting-verticle"> 性别 </td>
								<td class="top-line">
									<input type="radio" value="1"<?php
												if($set[0]['sex']==1){
													echo 'checked="checked"';
												}
											?>  name="sex"/>
									<span>男</span>
									<input type="radio" value="2"<?php
												if($set[0]['sex']==2){
													echo 'checked="checked"';
												}
											?>  name="sex">
									<span>女</span>
									<input type="radio" value="0"<?php
												if($set[0]['sex']==0){
													echo 'checked="checked"';
												}
											?>  name="sex"/>
									<span>保密</span></td>
							</tr>
							<tr>
								<td class="setting-title pull-left">个人简介</td>
								<td>
									<textarea placeholder="填写你的个人简介" name="sign"><?=$set[0]['sign']?></textarea>
								</td>
							</tr>
							<tr>
								<td class="setting-title pull-left setting-input">个人网站</td>
								<td>

									<input type="text" name="website" placeholder="http://你的网址">
									<p class="pull-right">
										填写后会在个人主页显示图标
									</p>
								</td>
							</tr>
							<tr>
								<td class="setting-title">微信二维码</td>
								<td class="weixin-qrcode">
									<input type="file" class="hide">
									<a class="btn btn-success" style="border-radius: 20px;">
										<input type="file" class="hide">
										更换图片
									</a>
									<p class="pull-right">
										上传后会在个人主页显示图标
									</p>
								</td>
							</tr>
							<tr>
								<td class="setting-title setting-input pull-left">社交帐号</td>
								<td class="social-bind">
									<p>
										你可以通过绑定的社交帐号登录简书。出于安全因素, 你最初用来创建账户的社交帐号不能移除。
									</p>
									<ul class="social-bind-list">
										<li>
											<div class="bind-name">
												<i class="iconfont icon-weibo"></i>
												<a href="#">
													绑定微博<i class="iconfont icon-dayuhao"></i>
												</a>
											</div>
										</li>
										<li>
											<div class="bind-name">
												<i class="iconfont icon-weixin1"></i>
												<a href="#">
													绑定微信<i class="iconfont icon-dayuhao"></i>
												</a>
											</div>
										</li>
										<li>
											<div class="bind-name">
												<i class="iconfont icon-qq"></i>
												<a href="#">
													绑定 QQ<i class="iconfont icon-dayuhao"></i>
												</a>
											</div>
										</li>
										<li>
											<div class="bind-name">
												<i class="iconfont icon-douban"></i>
												<a href="#">
													绑定豆瓣<i class="iconfont icon-dayuhao"></i>
												</a>
											</div>
										</li>
										<li>
											<div class="bind-name">
												<i class="iconfont icon-guge"></i>
												<a href="#">
													绑定 Google+<i class="iconfont icon-dayuhao"></i>
												</a>
											</div>
										</li>
									</ul></td>
							</tr>
						</tbody>
					</table>
					<input type="button" class="btn btn-success setting-save" value="保存" id='information_save'>
				</form>
			</div>

			<div class="certification">
				<div>
					<div class="title">
						简书新浪微博联合认证
					</div>
					<span>简书推荐作者</span>
					<ul>
						<li>
							<i class="iconfont icon-henggang"></i> 简书帐号注册超过 30 天
						</li>
						<li>
							<i class="iconfont icon-henggang"></i> 简书帐号绑定新浪微博帐号
						</li>
						<li>
							<i class="iconfont icon-gou"></i> 绑定手机号码
						</li>
						<li>
							<i class="iconfont icon-henggang"></i> 在简书发表文章字数达到 20000 字
						</li>
						<li>
							<i class="iconfont icon-henggang"></i> 在简书收获喜欢数达到 2000 个
						</li>
					</ul>
				</div>
				<div>
					<div class="title">
						简书新浪微博联合认证
					</div>
					<span>简书专题运营者</span>
					<ul>
						<li>
							<i class="iconfont icon-henggang"></i> 简书帐号注册超过 30 天
						</li>
						<li>
							<i class="iconfont icon-henggang"></i> 简书帐号绑定新浪微博帐号
						</li>
						<li>
							<i class="iconfont icon-gou"></i> 绑定手机号码
						</li>
						<li>
							<i class="iconfont icon-henggang"></i> 在简书参与编辑的专题收获订阅总数达到 1000 个
						</li>
					</ul>
				</div>
			</div>

			<div class="blacklist">
				<div class="title">
					你可以在用户主页将用户加入你的黑名单。在你黑名单中的用户无法在你文章下评论，无法在其它评论中提到你，无法给你发送简信，自动从你的粉丝列表移除且无法再关注你。
				</div>
				<span></span>
				<ul id="blacklist_del">
					<li>
						<a href="#">
							刘淼
						</a>
						<a>
							从黑名单中移除
						</a>
					</li>
					<li>
						<a href="#">
							刘水
						</a>
						<a>
							从黑名单中移除
						</a>
					</li>
					<li>
						<a href="#">
							刘三水
						</a>
						<a>
							从黑名单中移除
						</a>
					</li>
					<li>
						<a href="#">
							刘水水
						</a>
						<a>
							从黑名单中移除
						</a>
					</li>
					<li>
						<a href="#">
							刘水水水
						</a>
						<a>
							从黑名单中移除
						</a>
					</li>
					<li>
						<a href="#">
							刘...
						</a>
						<a>
							从黑名单中移除
						</a>
					</li>
				</ul>
			</div>

			<div class="setting-pay">
				<form action="#" method="post">
					<table>
						<thead>
							<tr>
								<th class="setting-head"></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="setting-title pull-left setting-editor top-line"> 赞赏功能 </td>
								<td class="top-line">
									<div class="col-xs-6">
										<input type="radio" value="true" name="reward">
										<span>开启</span>
									</div>
									<div class="col-xs-18">
										<input type="radio" value="false" name="reward">
										<span>关闭</span>
									</div>
									<p>
										开启后赞赏按钮将出现在你的文章底部
									</p></td>
							</tr>
							<tr>
								<td class="setting-title">默认接受赞赏金额</td>
								<td>
									<div class="input-group">
										<div class="input-group-addon">
											￥
										</div>
										<input type="text" style="outline:none;" value="2.00">
									</div></td>
							</tr>
							<tr>
								<td class="setting-title pull-left setting-input">赞赏描述</td>
								<td>									<textarea row="3"></textarea></td>
							</tr>
						</tbody>
					</table>
					<input type="button" class="btn btn-success setting-save" value="保存">
				</form>
			</div>

			<div class="account">
				<table>
					<thead>
						<tr>
							<th class="setting-head"></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="setting-title top-line">打包下载文章</td>
							<td class="top-line">
								<a href="#" class="btn btn-success">
									下载所有文章
								</a></td>
						</tr>

						<tr>
							<td class="setting-title">删除帐号</td>
							<td>
								<span class="btn btn-danger warn" style="border-radius: 20px;" id="del_account">删除帐号</span></td>
						</tr>

					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
<?php
require 'foot.php';
?>

<script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
<script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
<script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            //设置编辑器的内容
            // ue.setContent('hello');
            //获取html内容，返回: <p>hello</p>
            var html    = ue.getContent();
            //获取纯文本内容，返回: hello
            var txt     = ue.getContentTxt();
        });

        //==========================================================
        // 如何单独上传图片功能
        // 监听多图上传和上传附件组件的插入动作
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

        // 自定义按钮绑定触发多图上传和上传附件对话框事件
        document.getElementById('j_upload_img_btn').onclick = function () {
            var dialog = uploadEditor.getDialog("insertimage");
            dialog.title = '多图上传';
            dialog.render();
            dialog.open();
        };

        // 多图上传动作
        function _beforeInsertImage(t, result) {
            var imageHtml = '';
            var imgval = '';
            for(var i in result){
                imageHtml += '<li style="list-style: none;"><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="100"></li>';
                imgval    += ',' + result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('imgval').value = imgval;
        }
    </script>
