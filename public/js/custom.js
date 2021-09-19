$( document ).ready(function() {
    $('.formEmail').on('change', function() {
        //ajax request
        $.ajax({
            url: "/http://127.0.0.1:8000/customers/create",
            "type": "GET",
            "data": {"_token": "<?= csrf_token() ?>"}
            data: {
                'email' : $('.formEmail').val()
            },
            dataType: 'json',
            success: function(data) {
                if(date == true) {
                    alert('Email exists!');
                }
                else {
                    alert('Email doesnt!');
                }
            },
            error: function(data){
                //error
            }
        });
    });
  });