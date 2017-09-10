 <?php
 require 'header.php';
 if($_GET['sort']){
  if($_GET['sort']==1){
    $flml = 'blogs';
    $string = '博客内容';
  }
  if($_GET['sort']==2){
   $flml = 'comment';
   $string = '评论内容';
 }
 if($_GET['sort']==3){
   $flml = 'user';
   $string = '注册用户';
 };
}; 
?>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
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
      <ul class="breadcrumb">
       <li>
         <a href="mydb.php">首页</a>
         <span class="divider">/</span>
       </li>
       <li>
         <a href="#"><?=$string?></a>
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
            <h4><i class="icon-reorder"></i><?=$string?>列表</h4>
            <span class="tools">
              <a href="javascript:;" class="icon-chevron-down"></a>
              <a href="javascript:;" class="icon-remove"></a>
            </span>
          </div>
          <div class="widget-body">
            <table class="table table-striped table-bordered table-advance table-hover" id="sample_1">
              <thead>
                <tr>
                  <th><i class="icon-bullhorn"></i>用户ID</th>
                  <th class="hidden-phone"><i class="icon-question-sign"></i> 内容</th>
                  <th><i class="icon-bookmark"></i> 发表时间</th>
                  <th><i class=" icon-edit"></i> 账号</th>
                  <th>修改时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $result = $mysql->selectData($flml,'*','1=1');
               foreach ($result as $k => $v) {
                 ?>
                 <tr>
                  <td><a href="#"><?=$v['id']?></a></td>
                  <td class="hidden-phone"><textarea rows="1" cols="1" ><?=$v['content']?></textarea></td>
                  <td><?=$v['addtime']?></td>
                  <td><span class="label label-mini"><?=$v['username']?></span></td>
                  <td><?=$v['updatetime']?></td>
                  <td>
                   <a class="btn btn-primary change" name='change' value="<?=$v['aid']?>" href='./change.php?id=<?=$v['id']?>&sort=<?=$_GET['sort'];?>'><i class="icon-pencil"></i></a>
                   <button class="btn btn-danger delete" name='delete' value="<?=$v['id']?>" index="<?=$_GET['sort'];?>"
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
<script src="handl.js"></script>