<?php
    require './header.php';
    if($_GET['id']){
      if($_GET['sort']=1){
        $flml = 'blogs';
      $cate = $mysql->getOneData($flml, '*', 'id=' . $_GET['id']);};
      if($_GET['sort']=2){
         $flml = 'comment';
      $cate = $mysql->getOneData($flml, '*', 'id=' . $_GET['id']);};
      };
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
         分类管理
       </h3>
       <ul class="breadcrumb">
         <li>
           <a href="#">首页</a>
           <span class="divider">/</span>
         </li>
         <li>
           <a href="#">分类管理</a>
           <span class="divider">/</span>
         </li>
         <li class="active">
           添加
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
   <div class="row-fluid">
    <form action="" id="addcate" class="form-horizontal">
      <input type="hidden" name="parentid" value="<?=(int)$_GET['id'];?>">
      <input type="hidden" name="id" value="<?=(int)$cate['id'];?>">
      <div class="span12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="widget green">
          <div class="widget-title">
            <h4><i class="icon-reorder"></i>内容添加</h4>
            <div class="tools">
              <a href="javascript:;" class="collapse"></a>
              <a href="#portlet-config" data-toggle="modal" class="config"></a>
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
            </div>
          </div>
          <div class="widget-body form">
          <input type="hidden" name='id' value="<?=$_GET['id']?>">
            <div class="control-group "   id="container2">
             <script id="container1" name="content" type="text/plain" style="width:90%;height:300px" ><?=$cate['content']?></script> 
           </div>
           <div class="form-actions">
           <button class="btn btn-success" id="changeplcotent" type="button">保存</button>
            <button class="btn" type="reset" id='rechange'>重置</button>
          </div>

          <!-- END FORM-->
        </div>
      </div>
                    <!-- END VALIDATION ST
                    ATES-->
                  </div>
                </form>
              </div>

              <!-- END PAGE CONTENT-->

            </div>
            <!-- END PAGE CONTAINER-->
          </div>  
          <?php 
          require './footer.php';
          ?>
          <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
          <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
          <script>
        
              var ue = UE.getEditor('container1');
              ue.ready(function() {
            //设置编辑器的内容
            // ue.setContent('hello');
            //获取html内容，返回: <p>hello</p>
            var html    = ue.getContent();
            //获取纯文本内容，返回: hello
            var txt     = ue.getContentTxt();
          });
              $('#changeplcotent').click(function(){
                 var content=ue.getContentTxt() ;
                 var id="<?=$cate['id']?>";
                  $.ajax({
                    url: 'updata.php',
                    type: 'POST',
                    dataType: ' json',
                    data: {id:id,content:content},
                    success:function(data){
                      console.log(111);
                     if(data.r=='success'){
                      console.log(data);
                    ue.setContent(content);
                    alert('保存成功');
                     }
                    }
                  });  
              });
              $('#rechange').click(function(event) {
                 var content=ue.getContent() ;
                 content="<?=$cate['content']?>";
                 ue.setContent(content);
              });
          </script>