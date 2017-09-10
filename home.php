  <?php
  require './common/session.php';
  require './common/common.php';
  require './common/session_common.php';
  require './index_select.php';
  //exit;

   ?>
  <!-- 广告轮播 -->
  <section id="main_ab" class="carousel slide col-md-8 col-md-push-2 col-lg-8 col-lg-push-2 container" data-ride="carousel">

    <!-- 指示器（小点） -->
    <ol class="carousel-indicators">
      <li data-target="#main_ab" data-slide-to="0" class="active"></li>
      <li data-target="#main_ab" data-slide-to="1"></li>
      <li data-target="#main_ab" data-slide-to="2"></li>
      <li data-target="#main_ab" data-slide-to="3"></li>
    </ol>

    <!-- 轮播项 -->
    <div class="carousel-inner" role="listbox">
      <div class="item active" style="background-image:url('img/main_ad_01.jpg')"></div>
      <div class="item " style="background-image:url('img/main_ad_02.jpg')"></div>
      <div class="item " style="background-image:url('img/main_ad_04.jpg')"></div>
      <div class="item " style="background-image:url('img/main_ad_05.png')"></div>
    </div>

    <!-- 控制 -->
    <a class="left carousel-control" href="#main_ab" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#main_ab" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </section>

  <!-- ／广告轮播 -->

  <!-- 博客列表区域 -->

  <section id="blogs_list" class="col-md-8 col-md-push-2">
    <div class="blogs-list-box col-md-8 blogs">
      <?php
      //var_dump($blogs_list);
        foreach ($blogs_list as $value) {

      ?>
      <div class="col-md-12 blogs">
        <div class="head-img col-md-1">
          <img src="<?=$mysql->headimgChange($value['aid']);?>" alt="" style="width:50px;height:50px;">
        </div>
        <div class="blogs-username col-md-11">
          <?=$mysql->getOneData('user','username','id='.$value['aid'])['username']?>
          <span><?=$value['addtime']?></span>
        </div>
        <div class="blogs-content">
          <div class="blogs-left  col-md-9">
            <a href="index.php?id=<?=$value['id']?>"><?=$value['title']?></a>
            <div class="blogs-text">
              <?=$value['content']?>
            </div>
          </div>
          <div class="blogs-right col-md-3">
          <?=$mysql->imgChange($value['img']);?>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>


    <div class="blogs-list-right col-md-4">
      <div class="blogs-top">
        <img src="./img/banner-s-1.png" alt="">
        <img src="./img/banner-s-2.png" alt="">
        <img src="./img/banner-s-3.png" alt="">
        <img src="./img/banner-s-4.png" alt="">
        <img src="./img/banner-s-5.png" alt="">
      </div>
    </div>

    <button type="button" name="button" class="btn btn-zuopin col-md-6 col-md-push-1" id="read_more" value=0>阅读更多内容</button>
    <footer id='footer' class="col-md-12">
        <p>©2012-2017 上海佰集信息科技有限公司 / Tel:021-61995350 / 作品 / 沪ICP备11018329号-5 </p>
    </footer>
  </section>

  <div class="btn-list">
    <ul>
      <li  id="gotoTop">
        <a class="glyphicon glyphicon-menu-up"></a>
      </li>
    </ul>
  </div>
  <?php
    require './foot.php';
   ?>
