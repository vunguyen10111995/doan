$(document).ready(function() {
    $('.delete').submit(function(e) {
        var id = $(this).attr('data-id');
        var remove = $(this);
        e.preventDefault();
        var del = confirm('Are you sure you want to delete?');
        if (del) {
            $.ajax({
                type: 'POST',
                url: '/plan/comment/'+ id + '/delete',
                data:  $(this).serialize(),
                success: function(response) {
                    remove.parents('.comment-content').remove();
                },
            });
        } 
    });
});
