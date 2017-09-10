$('#login').click(function () {
    /* body... */
    $.ajax({
        url: './login.php',
        type: 'POST',
        dataType: 'json',
        data: $('#mylogin').serialize(),
        success:function (data) {
            /* body... */
            console.log(data);
            if(data.r == 'success'){
                window.location.href = 'index.php';
            }
        }
    });
    
});