$(document).ready(function() {
    $(document).on('click', '#follow', function(){
        let id = $(this).attr('userId');
        $.ajax({
            type: 'get',
            url: '/user/' + id + '/follow',
            data:  $(this).serialize(),
            success: function(response) {
                $('#follow-result').html(response);
                toastr.success('Follow success', 'Success Alert', {timeOut: 2000})
            },
        }); 
    });

    $(document).on('click', '#unfollow', function(){
        let id = $(this).attr('userId');
        $.ajax({
            type: 'get',
            url: '/user/' + id + '/unfollow',
            data:  $(this).serialize(),
            success: function(response) {
                $('#follow-result').html(response);
                toastr.success('UnFollow success', 'Success Alert', {timeOut: 2000})
            },
        }); 
    });
});
