<?php
  require './common/session.php';
  // echo "111";
  // exit;
  require './common/admin_common.php';
  require './common/session_common.php';
  // echo "111";
  // exit;
  $title_blogs = '';
  $myid = $mysql->getOneData('user','id','account = "'.$_SESSION['account'].'"');
  // exit;
  $blog = $mysql->selectData("blogs" , "title,id" , 'aid = "'.$myid['id'].'"','addtime DESC');
//exit;
  if($_GET){
    $title_blogs = $mysql->getOneData('blogs','title','id='.$_GET['wrid'])['title'];
    $content_blogs = $mysql->getOneData('blogs','content','id='.$_GET['wrid'])['content'];
  }
 ?>

  <body>
    <section class="container" id="blogs_w">

      <div class="col-md-3">
				<?php
        		foreach($blog as $val){
              if($_GET['wrid']==$val['id']){
                ?>
                <div class="blogs active">
                		<a class="iconfont icon-wenzhang" href="./blogs.php?wrid=<?=$val['id']?>"> <?=$val['title']?></a>
                </div>
                <?php
              }else{
                ?>
                <div class="blogs">
                    <a class="iconfont icon-wenzhang" href="./blogs.php?wrid=<?=$val['id']?>"> <?=$val['title']?></a>
                </div>
                <?php
              }
                ?>
                <?php
              }
				?>

      </div>
      <div class="title col-md-6">
        <input type="text" name="title" value="<?=$title_blogs?>" placeholder="请输入标题" id="blogs_title_upload">
      </div>
      <button type="button" id="j_upload_img_btn" class="btn btn-default col-md-3">上传封面图片</button>
      <div class="col-md-9">
            <div id="upload_img_wrap"></div>
            <input type="hidden" id="imgval" name="imgval" value="" class="col-md-4">
            <textarea id="Text" cols="20" rows="200" class="ckeditor" ><?=$content_blogs?></textarea>
        <textarea id="uploadEditor" style="display: none;"></textarea>
      </div>
      <input type="button" id="subm" value="提交" class="btn btn-default col-md-6">
    </section>
  </body>
</html>
<?php
  require './foot.php';
 ?>
 <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
 <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
 <script type="text/javascript">

 CKEDITOR.replace('Text');
 $('#subm').click(function(){
   OnSave();
 });
 function OnSave(){
        if(CKEDITOR.instances.Text.getData()==""){
        alert("内容不能为空！");
        return false;
        }else {
          if(!"<?=$_GET['wrid']?>"){
            var blogsid = '';
          }else{
            var blogsid = "<?=$_GET['wrid']?>";
          }
          console.log(blogsid);

          $.ajax({
                 url:'addblogs.php',
                 type:'POST',
                 dataType:'json',
                 data:{
                   id:blogsid,
                   HTMLcontent:CKEDITOR.instances.Text.getData(),
                   content:CKEDITOR.instances.Text.document.getBody().getText(),
                   title:$('#blogs_title_upload').val()?$('#blogs_title_upload').val():'无标题文章',
                   img:$('#imgval').val()
                 },
                 success:function(data){
                   console.log(data.id);
                   window.location.href = './index.php?id='+data.id;
                 }
               })

        }
    }

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
