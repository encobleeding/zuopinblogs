<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<?php
require './common/admin.common.php';
?> 
<head>
 <meta charset="utf-8" />
 <title>后台管理系统</title>
 <meta content="width=device-width, initial-scale=1.0" name="viewport" />
 <meta content="" name="description" />
 <meta content="" name="author" />
 <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
 <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
 <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
 <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
 <link href="css/style.css" rel="stylesheet" />
 <link href="css/style-responsive.css" rel="stylesheet" />
 <link href="css/style-default.css" rel="stylesheet" id="style_color" />
 <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
 <link rel="stylesheet" href="css/btn_css.css">
 <script src="js/jquery-1.8.3.min.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
 <!-- BEGIN HEADER -->
 <div id="header" class="navbar navbar-inverse navbar-fixed-top">
   <!-- BEGIN TOP NAVIGATION BAR -->
   <div class="navbar-inner">
     <div class="container-fluid">
       <!--BEGIN SIDEBAR TOGGLE-->
       <div class="sidebar-toggle-box hidden-phone">
         <div class="icon-reorder tooltips" data-placement="right" ></div>
       </div>
       <!--END SIDEBAR TOGGLE-->
       <!-- BEGIN LOGO -->
       <a class="brand" href="#">
         <img src="img/logo.png" alt="Metro Lab" />
       </a>
       <!-- END LOGO -->
       <!-- BEGIN RESPONSIVE MENU TOGGLER -->
       <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="arrow"></span>
       </a>
       <div class="top-nav ">
         <ul class="nav pull-right top-menu" >
           <!-- BEGIN SUPPORT -->
           <li class="dropdown mtop5">
             <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
               <i class="icon-comments-alt"></i>
             </a>
           </li>
           <li class="dropdown mtop5">
             <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
               <i class="icon-headphones"></i>
             </a>
           </li>
           <!-- END SUPPORT -->
           <!-- BEGIN USER LOGIN DROPDOWN -->
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="img/avatar1_small.jpg" alt="">
               <span class="username"><?=$_SESSION['realname']?></span>
               <b class="caret"></b>
             </a>
             <ul class="dropdown-menu extended logout">
               <li><a href="#"><i class="icon-user"></i>个人信息</a></li>
               <li><a href="#"><i class="icon-cog"></i>设置</a></li>
               <li><a href="mylogin1.php"><i class="icon-key"></i>退出</a></li>
             </ul>
           </li>
           <!-- END USER LOGIN DROPDOWN -->
         </ul>
         <!-- END TOP NAVIGATION MENU -->
       </div>
     </div>
   </div>
   <!-- END TOP NAVIGATION BAR -->
 </div>
 <div id="container" class="row-fluid">
  <!-- BEGIN SIDEBAR -->
  <div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">

      <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
      <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
          <input type="text" class="search-query" placeholder="Search" />
        </form>
      </div>
      <!-- END RESPONSIVE QUICK SEARCH FORM -->
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="sidebar-menu">
        <li class="sub-menu active">
          <a href="javascript:;" class="">
            <i class="icon-th"></i>
            <span>数据</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub" id="sider_leibie">
            <li ><a class="" href='showblogs.php?sort=1'>博客内容</a></li>
            <li><a class="" href='showcomment.php?sort=2' >用户评论</a></li>
            <li><a class="" href='showuser.php?sort=3'>注册用户</a></li>
            <li><a class="" href='showofficial.php?sort=4'>官方账号</a></li>
          </ul>
        </li>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <script>
    var num = "<?=$_GET['sort']?>";
    var num = parseInt(num);
    $('#sider_leibie').children().removeClass('active');
    $('#sider_leibie').children().eq(num-1).addClass('active');
  </script>