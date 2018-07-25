$(document).ready(function() {  
    $('.star').click(function(e) {
        var id = $(this).attr('plan-id');
        var userId = $(this).attr('user-id');
        console.log(userId);
        e.preventDefault();
        if(userId) {
            $.ajax({
                method: 'get',
                url: '/plan/' + id + '/rate',
                data: $(this).serialize(),
                success: function(response) {
                   $('.info').html(response);
                   toastr.success('Rate success', 'Success Alert', {timeOut: 2000})
                },
            });
        } else {
            toastr.warning('You need login', 'Fail Alert', {timeOut: 2000})
        }
        
    }); 
});
