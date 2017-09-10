
<?php
require './common/session.php';
require 'common/common.php';
require './common/session_common.php';
require './comment_select.php';

?>
<section id="main_ad" class=" col-md-6 col-md-push-3">
  <div id="text-title"><h1><strong><?=$result['title']?></strong></h1></div>
  <div id="author">
    <a href="<?=$mysql->users($_GET['id'])?>"><div id="author_img"><img src="<?=$mysql->headimgChange($result['aid'])?>" alt=""></div></a>
    <div id="author_info" >
      <span  class="author1" >签约作者</span>
      <span  class="author2"><?=$result['username']?></span>

      <br>
      <span class="pulish_time"><?=$result['addtime']?></span>
      <span class="wordage"> &nbsp;&nbsp;字数 2304</span>
      <span class="view_count">  &nbsp;&nbsp;阅读 6254 </span>
      <span class="comments_count">  &nbsp;&nbsp;评论 17</span>
      <span class="likes_count">  &nbsp;&nbsp;喜欢 173</span>
    </div>
  </div>

  <div id="content">
    <?=$mysql->imgChange($result['img'])[1];?>
    <p id="content_text" ><?=$result['content']?></p>
  </div>
  <div id="declare"></div>
  <div  class="author-bottom">
    <div id="author_img"><img src="<?=$mysql->headimgChange($result['aid'])?>" alt=""></div>
    <div id="author_bottom_info">
      <span class='author2'><?=$mysql->getOneData('user','username','id='.$result['aid'])['username']?></span>
      <span class='author1'>签约作者</span><br>
      <span class="pulish_time"><?=$result['addtime']?></span>
      <span class="wordage">字数</span>
      <span class="view_count">阅读</span>
      <span class="comments_count">评论</span>
      <span class="likes_count">喜欢</span>
    </div>
    <?php
      $targetid = $mysql->getOneData('user','targetid','account="'.$_SESSION['account'].'"')['targetid'];
      //var_dump($targetid);
      $arrid = explode(',',$targetid);
      $havefollow = true;
      // var_dump($arrid);
      // exit;
      foreach ($arrid as $key => $value) {
        # code...
        if($value == $result['aid']){
        ?>
    <div class="author3-bottom"><a class="btn btn-danger author3-a" id="follow_write" value="<?=$_SESSION['account']?>" index="<?=$result['aid']?>">已关注</a></div>
  <?php
      $havefollow = false;
      }
    } ?>
    <?php
      if($havefollow){
        ?>
        <div class="author3-bottom"><a class="btn btn-success author3-a" id="follow_write" value="<?=$_SESSION['account']?>" index="<?=$result['aid']?>">关注作者</a></div>
        <?php
      }
     ?>
    <hr>


  </div>
  <div class="declare-div">一份打赏一份情。</div>

  <a class='btn btn-danger declare-button' href="#">赞赏支持</a>
  <hr>

  <div id="gam">
    <div id="like">
      <span href=""><i id="icon"></i>喜欢</span>
      <span href="">666</span>
    </div>
    <span id="wechat"></span>
    <span id="weibo"></span>
    <span class="more-jony">更多分享</span>
  </div>
  <div  id="comments_list" >
    <textarea name="" id="textarea"  placeholder="写下你的评论..." session="<?=$_SESSION['account']?>"></textarea>
    <div id="comments" >
      <span id="comments-consoil">取消</span>
      <span id="comments-send" class="btn btn-success" parentid="<?=$_GET['id']?>" userid="<?=$mysql->getOneData('user','id','account="'.$_SESSION['account'].'"')['id']?>">发送</span>
    </div>
    <hr id='hrr'>
    <div id="plnr">
      <?php

      foreach ($result2 as $k => $v) {
        ?>
        <div class="pl">
          <div class="pl-img"><img src="<?=$mysql->headimgChange($v['aid'])?>" alt="" style="width:100%;height:100%;border-radius:50%;"></div>
          <div class="pl-position">
            <div class="pl-name"><?=$mysql->getOneData('user','username','id='.$v['aid'])['username']?></div>
            <div class="pl-time"><?=$v['addtime']?></div>
          </div>
          <div class="pl-content"><?=$v['content']?></div>
        </div>
        <?php } ?>
      </div>
      <div id = 'button_all'>
        <button value="1" class='btn'>首页</button>
         <?php
        if($page>1){
          echo '<button value="1"  class="btn">上一页</button>';
        };
        for($i=0;$i<5;$i++){
          if($page+$i>$totalpage){
            break;
          }
          echo '<button value="'.($page+$i).'" class="btn">'.($page+$i).'</button>';
        }
        if($page<$totalpage){
          echo '<button value="'.($page+1).'" class="btn">下一页</button>';
        }
        ?>

        <button value = "<?=$totalpage?>" class="btn">尾页</button>
      </div>
    </div>
  </section>
      <?php

        require './foot.php';
       ?>
      <script src="./js/index.js"></script>
