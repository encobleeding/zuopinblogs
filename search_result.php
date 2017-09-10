<?php
  require './common/session.php';
  require 'like_search.php';
  require './common/session_common.php';
  // exit;
 ?>

 <section id="blogs_list" class="col-md-8 col-md-push-2">
   <div class="blogs-list-right col-md-4 search-setting">
     <div class="aside">
       <ul>
         <li class="active" id="blogs">
           <a>
             <div class="setting-icon"><i class="iconfont icon-wenzhang"></i></div> <span>文章</span>
           </a>
         </li>
         <li id="user">
           <a>
             <div class="setting-icon"><i class="iconfont icon-yonghu"></i></div> <span>用户</span>
           </a>
         </li>
       </ul>
     </div>
   </div>

   <div class="blogs-list-box col-md-8 blogs"  id="blogs_box">
     <?php
       foreach ($search_list as $value) {


     ?>
     <div class="col-md-12 blogs">
       <div class="head-img col-md-1">
         <img src="<?=$mysql->getOneData('user','img','id='.$value['aid'])['img'];?>" alt="" style="width:50px;height:50px;">
       </div>
       <div class="blogs-username col-md-11">
         <?=$value['username']?>
         <span><?=$value['addtime']?></span>
       </div>
       <div class="blogs-content">
         <div class="blogs-left  col-md-9">
           <a href="index.php?id=<?=$value['id']?>"><?=str_replace($_GET['search'],'<em class="search-color">'.$_GET['search'].'</em>',$value['title'])?></a>
           <div class="blogs-text">
             <?=str_replace($_GET['search'],'<em class="search-color">'.$_GET['search'].'</em>',$value['content'])?>
           </div>
         </div>
         <div class="blogs-right col-md-3">
           <?=$mysql->imgChange($value['img']);?>
         </div>
       </div>
     </div>
   <?php } ?>
   </div>


   <div class="users-list-box col-md-8 users" id="users_box">
     <?php
        foreach ($search_user_list as $key => $value) {
          # code...
          foreach ($tararr as $k => $val) {
            # code...
            //var_dump($val);
            if($val == $value['id']){
              $follow = true;
              break;
            }
          }
          if(!$follow){
      ?>
     <div class="col-md-12 users">
       <div class="users-left col-md-8">
         <div class="head-img col-md-2">
           <a href="./usersartic.php?id=<?=$value['id']?>"><img src="<?=$value['img']?>" alt="" style="width:70px;height:70px;border-radius:50%;"></a>
         </div>
         <div class="users-info  col-md-8">
           <a href="./usersartic.php?id=<?=$value['id']?>"><div class="users-username col-md-12">
             <?=str_replace($_GET['search'],'<em class="search-color">'.$_GET['search'].'</em>',$value['username'])?>
           </div></a>
           <div class="users-self-info col-md-12">
             <span>关注 <?=$mysql->numFollow($value['id'])['tarnum']?>&nbsp;&nbsp;|&nbsp;&nbsp;粉丝 <?=$mysql->numFollow($value['id'])['fansnum']?>&nbsp;&nbsp;|&nbsp;&nbsp;文章 <?=$value['blognum']?></span> <br>
             <span>写了 <?=$value['id']?> 个字，获得了 <?=$value['id']?> 个喜欢</span>

           </div>
         </div>
       </div>
       <div class="users-right col-md-4">
         <div class="btn btn-success follow-btn" value="<?=$_SESSION['account']?>" index="<?=$value['id']?>">
           <i class="iconfont icon-jia">&nbsp;&nbsp;关注</i>
         </div>
       </div>
     </div>
   <?php }else{
     ?>
     <div class="col-md-12 users">
       <div class="users-left col-md-8">
         <div class="head-img col-md-2">
           <a href="./usersartic.php?id=<?=$value['id']?>"><img src="<?=$value['img']?>" alt="" style="width:70px;height:70px;"></a>
         </div>
         <div class="users-info  col-md-8">
           <a href="./usersartic.php?id=<?=$value['id']?>"><div class="users-username col-md-12">
             <?=str_replace($_GET['search'],'<em class="search-color">'.$_GET['search'].'</em>',$value['username'])?>
           </div></a>
           <div class="users-self-info col-md-12">
             <span>关注 <?=$mysql->numFollow($value['id'])['tarnum']?>&nbsp;&nbsp;|&nbsp;&nbsp;粉丝 <?=$mysql->numFollow($value['id'])['fansnum']?>&nbsp;&nbsp;|&nbsp;&nbsp;文章 <?=$value['blognum']?></span> <br>
             <span>写了 <?=$value['id']?> 个字，获得了 <?=$value['id']?> 个喜欢</span>

           </div>
         </div>
       </div>
       <div class="users-right col-md-4">
         <div class="btn follow-btn" value="<?=$_SESSION['account']?>" index="<?=$value['id']?>">
           <i class="" style="color:#ea6f5a;font-size:20;">已关注</i>
         </div>
       </div>
     </div>
     <?php
     $follow = false;
   }
 }
   ?>
   </div>
 </section>

 <?php
  require './foot.php'
  ?>
