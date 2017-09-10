<?php
  require 'header.php';
$sortmb = $_GET['sort'];
?>
 <!-- END HEADER -->
 <!-- BEGIN CONTAINER -->
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


        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon-cogs"></i>
            <span>Components</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="calendar.html">Calendar</a></li>
            <li><a class="" href="grids.html">Grids</a></li>
            <li><a class="" href="chartjs.html">Chart Js</a></li>
            <li><a class="" href="flot_chart.html">Flot Charts</a></li>
            <li><a class="" href="gallery.html"> Gallery</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon-tasks"></i>
            <span>Form Stuff</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="form_layout.html">Form Layouts</a></li>
            <li><a class="" href="form_component.html">Form Components</a></li>
            <li><a class="" href="form_wizard.html">Form Wizard</a></li>
            <li><a class="" href="form_validation.html">Form Validation</a></li>
            <li><a class="" href="dropzone.html">Dropzone File Upload </a></li>
          </ul>
        </li>
        <li class="sub-menu active">
          <a href="javascript:;" class="">
            <i class="icon-th"></i>
            <span>用户数据</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a class="" href='bkcontent.php?sort=1'>博客内容</a></li>
            <li><a class="" href='plcontent.php?sort=2' >用户评论</a></li>
            <li><a class="" href='member.php?sort=3'>注册用户</a></li>

          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon-fire"></i>
            <span>Icons</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="font_awesome.html">Font Awesome</a></li>
            <li><a class="" href="glyphicons.html">Glyphicons</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a class="" href="javascript:;">
            <i class="icon-trophy"></i>
            <span>Portlets</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a href="general_portlet.html" class=""> General Portlet</a></li>
            <li><a href="draggable_portlet.html" class="">Draggable Portlet</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a class="" href="javascript:;">
            <i class="icon-map-marker"></i>
            <span>Maps</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a href="vector_map.html" class="">Vector Maps</a></li>
            <li><a href="google_map.html" class="">Google Map</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon-file-alt"></i>
            <span>Sample Pages</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="blank.html">Blank Page</a></li>
            <li><a class="" href="blog.html">Blog</a></li>
            <li><a class="" href="timeline.html">Timeline</a></li>
            <li><a class="" href="profile.html">Profile</a></li>
            <li><a class="" href="about_us.html">About Us</a></li>
            <li><a class="" href="contact_us.html">Contact Us</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon-glass"></i>
            <span>Extra</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="lock.html">Lock Screen</a></li>
            <li><a class="" href="invoice.html">Invoice</a></li>
            <li><a class="" href="pricing_tables.html">Pricing Tables</a></li>
            <li><a class="" href="search_result.html">Search Result</a></li>
            <li><a class="" href="faq.html">FAQ</a></li>
            <li><a class="" href="404.html">404 Error</a></li>
            <li><a class="" href="500.html">500 Error</a></li>
          </ul>
        </li>

        <li>
          <a class="" href="login.html">
            <i class="icon-user"></i>
            <span>Login Page</span>
          </a>
        </li>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE -->  
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
          <span class="text">Theme Color:</span>
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
      <h3 class="page-title">
        用户评论列表
      </h3>
      <ul class="breadcrumb">
       <li>
         <a href="#">首页</a>
         <span class="divider">/</span>
       </li>
       <li>
         <a href="#">评论列表</a>
       </li>
       <li class="pull-right search-wrap">
         <form action="search_result.html" class="hidden-phone">
           <div class="input-append search-input-area">
             <input class="" id="appendedInputButton" type="text">
             <button class="btn" type="button"><i class="icon-search"></i> </button>
           </div>
         </form>
       </li>
     </ul>
     <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
 </div>
 <?php
  $result = $mysql->selectData('user','*','1=1');
 ?>
 
 <!-- END PAGE HEADER-->
 <!-- BEGIN ADVANCED TABLE widget-->
 <div class="row-fluid">
  <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="row-fluid">
      <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
          <div class="widget-title">
            <h4 id="h44"><i class="icon-reorder"></i>注册用户列表</h4>
            <span class="tools">
              <a href="javascript:;" class="icon-chevron-down"></a>
              <a href="javascript:;" class="icon-remove"></a>
            </span>
          </div>
          <div class="widget-body">
            <table class="table table-striped table-bordered table-advance table-hover">
              <thead>
                <tr>
                  <th><i class="icon-bullhorn"></i>用户ID</th>
                  <th class="hidden-phone"><i class="icon-question-sign"></i>手机号</th>
                  <th><i class="icon-bookmark"></i> 注册时间</th>
                   <th>用户名</th>  
                  <th>操作</th>   

                </tr>
              </thead>
              <tbody>
               <?php
               
               foreach ($result as $k => $v) {
               ?>
               <tr>
                <td><a href="#"><?=$v['id']?></a></td>
                <td class="hidden-phone"><?=$v['tel']?></td>
                <td><?=$v['addtime']?></td>
                 <td><?=$v['username']?></td>
                <td> 
                  <a class="btn btn-primary change" name='change' value="<?=$v['id']?>" href='./change.php?id=<?=$v['id']?>&sort=<?=$sortmb?>'><i class="icon-pencil"></i></a>
                  <button class="btn btn-danger delete" name='delete' value="<?=$v['id']?>" index="<?=$sortmb?>"
                 ><i class="icon-trash "></i></button>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- END BASIC PORTLET-->
    </div>
  </div>

  <!-- END ADVANCED TABLE widget-->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->  
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<?php  
  require 'footer.php';
?>
<script>
    $('.delete').click(function () {
      var id=$(this).attr('value');
      var sort = $(this).attr('index');
      $.ajax({
        url: 'delete.php',
        type: 'POST',
        dataType: 'json',
        data: {id: id,sort:sort},
        success:function (data) {
          if(data.r=='success'){
          	console.log(11);
            window.location.reload();
          }
        }
      })
    })
 </script>

