$('#register_btn').click(function(){
  $.ajax({
    url:'register_user.php',
    type:'POST',
    dataType:'json',
    data:$('#register_form').serialize(),
    success:function(){

    }
  })
})
