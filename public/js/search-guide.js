$(document).ready(function(e) {
    var timer;
    $(document).on('keyup', '#search_guide', function() {
        var keyword = $(this).val();
        if (keyword.length > 0) {
            timer = setTimeout(function() {
                $.ajax({
                    method : 'GET',
                    url : 'guide/search',
                    data : {'keyword': keyword},
                    success : function(response) {
                        $('.guide-list').html(response);
                    },
                });
            }, 1000);
        }
    });
});
