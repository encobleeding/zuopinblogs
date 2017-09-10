
$('.delete').on('click',function () {
  var id=$(this).attr('value');
  var sort = $(this).attr('index');
  console.log(id);
  console.log(sort);
  $.ajax({
    url: 'delete.php',
    type: 'POST',
    dataType: 'json',
    data: {id:id,sort:sort},
    success:function (data) {
      if(data.r=='success'){
        window.location.reload();
      }
    }
  })
});
$('.ok').click(function () {
  if($(this).attr('index')=='0'){
    $(this).attr('index','1');
    var id=parseInt($(this).attr('id'));
    var n=1;
    $.ajax({
      url: 'ad.php',
      type: 'POST',
      dataType: 'json',
      data: {id: id,n:n},
      success:function (data) {
        if(data.r=='success'){
        }
      }
    })
  }else{
    $(this).attr('index','0');
    var id=parseInt($(this).attr('id'));
    var n=2;
    $.ajax({
      url: 'ad.php',
      type: 'POST',
      dataType: 'json',
      data: {id: id,n:n},
      success:function (data) {
        if(data.r=='success'){
        }
      }
    })
  }
});
$('#sure').click(function(){
  addx();
})

function addx(){
  $.ajax({
    url: 'select.php',
    type: 'POST',
    dataType: 'json',
    data: {id:1},
    success:function(data){
      if(data){
        $('#tablex').empty();
        for(k in data){
          $('#tablex').append('<tr><td>'+data[k]['id']+'</td><td class="hidden-phone">'+data[k]['title']+'</td></tr>');
        }
      }
    }
  })
}

//addx();

$('#btn-search').click(function () {
  var id= parseInt($('#searchx').val());
 $("input[id='"+id+"']").focus();
});
$('#btn_add').click(function () {
  if($('#tablex').children().length>5){
    alert('数量超出限制!');
  }else{
    $('#tablex').empty();
  }
})
