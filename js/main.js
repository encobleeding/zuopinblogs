
var num=3;
$('#read_more').click(function(){
  console.log(11);
  $(this).val(parseInt($(this).val())+1);
  //console.log($(this).val(parseInt($(this).val())+1));
  var num = $(this).val();
  $.ajax({
    url:'./index_select.php',
    type:'POST',
    dataType:'json',
    data:{click_num:num},
    success:function(data){
      if(data[0].blogspage - 1 >= num){
        for(key in data){
          var node = $('.blogs-list-box').children().eq(0).clone();
          //console.log(node.children());
          node.html('<div class="head-img col-md-1"><img src="'+data[key]['headimg']+'" alt="" style="width:50px;height:50px;"></div><div class="blogs-username col-md-11">'+data[key]['username']+'<span>'+data[key]['addtime']+'</span></div><div class="blogs-content"><div class="blogs-left  col-md-9"><a href="index.php?id='+data[key]['id']+'">'+data[key]['title']+'</a><div class="blogs-text">'+data[key]['content']+'</div></div><div class="blogs-right col-md-3">'+imgchange(data[key]['img'])+'</div></div>');
          $('.blogs-list-box').append(node);

        }
      }else {
        $('#read_more').html('没有更多的内容啦！！').attr('disabled',"disabled");
      }

    }


  });
})
function imgchange(str){
  var arr = [];
  if(str){
     arr = str.split(',');
     return '<img src="'+arr[1]+'" alt="">';
  }
    return '';
}
// function headimgchange(str){
//   var arr = [];
//   if(str){
//      arr = str.split(',');
//      return arr[0];
//   }
//     return '';
// }

$("#gotoTop").click(function(){
    $('html,body').animate({scrollTop:0},500);
})


$(window).scroll(function(){
    //console.log($(window).scrollTop());
    if($(window).scrollTop() > 100 ){
      $("#gotoTop").fadeIn();
    }else{
      $("#gotoTop").fadeOut();
    }
})

$('#search_btn').click(function(){
  window.location.href = './search_result.php?search='+$(this).prev().val()+"&type=blogs";
})

$('#search_input').focus(function(){
  document.onkeydown = function(e){
    var ev = document.all ? window.event : e;
    if(ev.keyCode==13) {

        window.location.href = './search_result.php?search='+$('#search_input').val();
     }
   }
})

$('#blogs').click(function(){
  $('#user').removeClass('active');
  $(this).attr('class','active');
  $('#users_box').hide();
  $('#blogs_box').show();
})
$('#user').click(function(){
  $('#blogs').removeClass('active');
  $(this).attr('class','active');
  $('#blogs_box').hide();
  $('#users_box').show();
})

$('.follow-btn').on('click',function(){
    var that = $(this);
    if(!$(this).attr('value')){
      window.location.href = './login.php';
    }
    if($(this).children().html() == '取消关注'){
      $(this).attr('class','btn btn-success follow-btn');
      $(this).children().css({'color':'#fff'}).html('<i class="iconfont icon-jia">&nbsp;&nbsp;关注</i>');
      $.ajax({
        url:'./follow.php',
        type:'POST',
        dataType:'json',
        data:{
          follow:'notfollow',
          id:that.attr('index')
        },
        success:function(){}
      })
    }else{
      $(this).attr('class','btn follow-btn');
      $(this).children().css({'color':'#ea6f5a','font-size':20}).html('已关注').attr('class','');
      //console.log(that.attr('index'));
      $.ajax({
        url:'./follow.php',
        type:'POST',
        dataType:'json',
        data:{
          follow:'follow',
          id:that.attr('index')
        },
        success:function(){}
      })
    }
})
$('.follow-btn').mouseover(function(){
  if($(this).children().html() == '已关注'){
    $(this).children().html('取消关注');
  }
})
$('.follow-btn').mouseout(function(){
  if($(this).children().html() == '取消关注'){
    $(this).children().html('已关注');
  }
})
// $('#destroy_session').click(function(){
//
//   window.location.reload();
// })
