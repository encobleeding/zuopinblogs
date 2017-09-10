$('#addcatebutton').click(function () {
    /* body... */
    $.ajax({
        url: './addcatesubmit.php',
        type: 'POST',
        dataType: 'json',
        data: $('#addcate').serialize(),
        success:function (data) {
            /* body... */
            console.log(data);
            if(data.r == 'success'){
                window.location.href = 'index.php';
            }
        }
    });
    
});