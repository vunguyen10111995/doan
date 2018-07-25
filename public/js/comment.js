$(document).ready(function() {
    $('#comment-form').submit(function(e) {
        var id = $('#plan_id').attr('data-id');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/service/' + id + '/comment',
            data:  $(this).serialize(),
            success: function(response) {
                $('.show-comment').prepend(response);
                $('.text-comment').val('');
            },
        });
    });

    $('#comment').on('click', '.edit-comment',function(e) {
        var comment_id = $(this).attr('data');
        var plan_id = $(this).attr('plan-id');
        var content = $(this).attr('value');
        var edit = $(this);
        form = '';
        form += '<form class="comment-update" method="get" enctype="multipart/form-data" data-id='+ comment_id +'>'
        form += '<input type="hidden" name="_token" value="{{ csrf_token() }}">'
        form += '<input type="hidden" name="service_id" class="plan_id" value='+ plan_id +'>'
        form += '<textarea name="content" class="content-comment form-control">' + content + '</textarea>'
        form += '<button type="submit" class="btn buttonTransparent btn-comment">Edit</button>'
        form += '</form>';
        edit.parents('.comment-content').find('.framgia-content').html(form);  
     
        $('.comment-update').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: '/service/comment/' + comment_id + '/update',
                data:  $(this).serialize(),
                success: function(response) {
                    edit.parents('.comment-content').html(response);
                },
            }); 
        });
    });
});
